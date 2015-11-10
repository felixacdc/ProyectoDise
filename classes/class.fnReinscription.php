<?php

/**
 *FUNCIONES DE REINSCRIPCION DE ALUMNOS
 */
class Reinscription
{

  public static function depurar($dato, $db){
    return $db->real_escape_string(htmlspecialchars($dato));
  }

  function fnLoadDataStudent($idStudent)
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT * FROM estudiantes WHERE idEstudiante='$idStudent'");

    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      $dataArray = array();
      $i = 0;

      while($data = $sql->fetch_assoc()){
        $dataArray[$i] = array("name" => $data['nombreEstudiante'], "address" => $data['direccionEstudiante'],
                                "phone" => $data['telefonoEstudiante'], "email" => $data['emailEstudiante'],
                                "estado" => $data['idEstado']);
        $i++;
      }

      header("Content-type: application/json");
      return json_encode($dataArray);
    }else {
      $dataArray[0] = array("Error" => 'Error al encontrar estudiante');
      header("Content-type: application/json");
      return json_encode($dataArray);
    }
  }

  public function fnSearchCycles($idStudent)
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT IdCicloEscolar FROM asignaciongrados WHERE idEstudiante='$idStudent'");

    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      $dataArray = array();
      $i = 0;

      while($data = $sql->fetch_assoc()){
        $dataArray[$i] = array("cycles" => $data['IdCicloEscolar']);
        $i++;
      }

      header("Content-type: application/json");
      return json_encode($dataArray);
    }else {
      $dataArray[0] = array("cycles" => '0');
      header("Content-type: application/json");
      return json_encode($dataArray);
    }
  }

  public function fnSendReinscription($id, $namePost, $addressPost, $phonePost, $emailPost, $asignacionSeccion, $cicloEscolar)
  {
    $db = new ConnectionClass();

    $tname = $this::depurar($namePost, $db);
    $taddress = $this::depurar($addressPost, $db);
    $tphone = $this::depurar($phonePost, $db);
    $temail = $this::depurar($emailPost, $db);

    $sql = $db->query("UPDATE estudiantes
                        SET nombreEstudiante = '$tname', direccionEstudiante = '$taddress',
                        telefonoEstudiante = '$tphone', emailEstudiante = '$temail', idEstado='1'
                        WHERE IdEstudiante = '$id'");

    if ($sql) {

      $sqlAsginacionGrado = $db->query("INSERT INTO asignaciongrados (IdEstudiante, IdCicloEscolar,
                                        idAsignacionSeccion)
                                        VALUES ('$id', '$cicloEscolar', '$asignacionSeccion')");
      if ($sqlAsginacionGrado) {

          return 'Reinscripcion Realizada Correctamente';

      }else {
          return 'Error en el Registro';
      }
    } else{
      return 'Error en el Registro';
    }
  }

  public function fnSendManStudents($id, $namePost, $addressPost, $phonePost, $emailPost, $estado)
  {
    $db = new ConnectionClass();

    $tname = $this::depurar($namePost, $db);
    $taddress = $this::depurar($addressPost, $db);
    $tphone = $this::depurar($phonePost, $db);
    $temail = $this::depurar($emailPost, $db);

    $sql = $db->query("UPDATE estudiantes
                        SET nombreEstudiante = '$tname', direccionEstudiante = '$taddress',
                        telefonoEstudiante = '$tphone', emailEstudiante = '$temail', idEstado='$estado'
                        WHERE IdEstudiante = '$id'");

    if ($sql) {

      return 'Modificacion Realizada Correctamente';

    } else{
      return 'Error en el Registro';
    }
  }

  public function fnSearchLastPayment($idStudent)
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT M.idMes
                        FROM detalletransacciones as D
                        inner join mes as M on D.idMes = M.idMes
                        inner join cicloescolar as CL on CL.idCicloEscolar = D.idCicloEscolar
                        INNER JOIN transacciones as T on D.idTransaccion = T.idTransaccion
                        WHERE T.IdEstudiante = '$idStudent' and D.idCicloEscolar = (
                          SELECT C.IdCicloEscolar
                          FROM asignaciongrados as AG
                          inner join cicloescolar as C on AG.IdCicloEscolar = C.IdCicloEscolar WHERE AG.IdEstudiante = '$idStudent' ORDER BY AG.idAsignacionGrados DESC LIMIT 1)
                        ORDER BY D.iddetalleTransaccion DESC LIMIT 1");
    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      $dataArray = array();
      $i = 0;

      while($data = $sql->fetch_assoc()){
        $dataArray[$i] = array("Mes" => $data['idMes']);
        $i++;
      }

      header("Content-type: application/json");
      return json_encode($dataArray);
    }
  }
}
