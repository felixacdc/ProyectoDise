<?php

/**
 * CLASE CON FUNCIONES DE USUARIO CATEDRATICO
 */

class Students
{

  public function fnSearchIdStudent($idUserPOST)
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT idEstudiante FROM usuarios WHERE usuario='$idUserPOST'");

    if ($sql) {
      $data = $sql->fetch_assoc();

      return $data['idEstudiante'];
    }else {
      return 'error';
    }

  }

  public function fnViewRatings($value)
  {
    $db = new ConnectionClass();

    $idCiclo = $value['ciclo'];
    $idStudent = $value['student'];

    $sql = $db->query("SELECT * FROM asignaciongrados
                        WHERE IdEstudiante = '$idStudent' AND IdCicloEscolar = '$idCiclo'");
    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      $data = $sql->fetch_assoc();

      $idAssignSection = $data['idAsignacionSeccion'];

      $sql = $db->query("SELECT C.nombreCurso, B.idBimester, DR.Procedural, DR.Actitudinal, DR.Exam, DR.TotalScore
                          FROM AsignacionSeccion AS AGS
                          INNER JOIN grado AS G ON G.idGrado = AGS.idGrado
                          INNER JOIN asignacioncursos AS AGC ON G.idGrado = AGC.idGrado
                          INNER JOIN cursos AS C ON AGC.idCurso = C.idCurso
                          INNER JOIN Ratings AS R ON R.idAssignCourses = AGC.idAsignacionCursos
                          INNER JOIN DetailedRatings AS DR ON DR.idRatigns = R.idRatings
                          INNER JOIN Bimester AS B ON B.idBimester = R.idBimester
                          WHERE AGS.idAsignacionSeccion = '$idAssignSection' AND DR.idStudent = '$idStudent'
                          AND AGC.idCicloEscolar = '$idCiclo' AND R.idAssignSections = '$idAssignSection'
                          ORDER BY B.idBimester ASC");
      $numberRecord = $sql->num_rows;

      if ($numberRecord != 0) {

        $dataArray = array();
        $i = 0;

        while($data = $sql->fetch_assoc()){
          $dataArray[$i] = array("curso" => $data['nombreCurso'], "procedural" => $data['Procedural'],
                                  "Actitudinal" => $data['Actitudinal'], "Exam" => $data['Exam'],
                                  "TotalScore" => $data['TotalScore'], "idBimester" => $data['idBimester']);
          $i++;
        }

        header("Content-type: application/json");
        return json_encode($dataArray);
      }else {
        $dataArray[0] = array("id" => '0', "nombre" => 'Error Segunda COnsulta.');
        header("Content-type: application/json");
        return json_encode($dataArray);
      }


    }else {
      $dataArray[0] = array("id" => '-1', "nombre" => 'El estudiante no aparece inscrito en este ciclo.');
      header("Content-type: application/json");
      return json_encode($dataArray);
    }
  }

  public function fnSearchPayment($value)
  {
    $db = new ConnectionClass();

    $idCiclo = $value['ciclo'];
    $idStudent = $value['student'];

    $sql = $db->query("SELECT M.idMes , M.Descripcion, D.iddetalleTransaccion, CL.año
                        FROM detalletransacciones as D
                        inner join mes as M on D.idMes = M.idMes
                        inner join cicloescolar as CL on CL.idCicloEscolar = D.idCicloEscolar
                        INNER JOIN transacciones as T on D.idTransaccion = T.idTransaccion
                        WHERE T.IdEstudiante = '$idStudent' and D.idCicloEscolar = '$idCiclo'
                        ORDER BY D.iddetalleTransaccion DESC LIMIT 1");
    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      $idMes;
      $valorMes;
      $año;

      while($data = $sql->fetch_assoc()){
        $idMes = $data['idMes'];
        $año = $data['año'];
      }

      $mesActual = date("n");
      $valorMes = $idMes - 1;

      if($valorMes >= $mesActual || $valorMes == 10){
        if($año < date('Y') && $valorMes == 10){
          $dataArray[0] = array("id" => '-1', "message" => 'No esta al dia en sus pagos');
          header("Content-type: application/json");
          return json_encode($dataArray);
        }else {
          $dataArray[0] = array("id" => '10', "message" => 'Si');
          header("Content-type: application/json");
          return json_encode($dataArray);
        }

      }else{
        $dataArray[0] = array("id" => '-1', "message" => 'No esta al dia en sus pagos');
        header("Content-type: application/json");
        return json_encode($dataArray);
      }


    }else{
      $dataArray[0] = array("id" => '-1', "message" => 'No se pueden ver las notas');
      header("Content-type: application/json");
      return json_encode($dataArray);
    }


  }
}
