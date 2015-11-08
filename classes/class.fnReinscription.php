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
                                "phone" => $data['telefonoEstudiante'], "email" => $data['emailEstudiante']);
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
                        telefonoEstudiante = '$tphone', emailEstudiante = '$temail'
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
}
