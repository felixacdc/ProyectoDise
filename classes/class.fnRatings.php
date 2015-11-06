<?php

/**
 * FUNCIONES DE Calificaciones
 */
class Ratings
{

  public function fnLoadStudents($idAssign, $idCiclo, $idAssignCourses, $idBimester)
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT * FROM Ratings
                        WHERE idAssignCourses = '$idAssignCourses' AND idBimester = '$idBimester' AND idAssignSections = '$idAssign';");
    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      $dataArray[0] = array("id" => '-1', "nombre" => 'Notas del Curso ya Fueron Ingresadas');
      header("Content-type: application/json");
      return json_encode($dataArray);
    }else {
      $sql = $db->query("SELECT E.idEstudiante, E.nombreEstudiante FROM AsignacionSeccion AS AGS
                          INNER JOIN asignaciongrados AS AGG ON AGS.idAsignacionSeccion = AGG.idAsignacionSeccion
                          INNER JOIN estudiantes AS E ON E.idEstudiante = AGG.idEstudiante
                          WHERE AGG.idCicloEscolar = '$idCiclo' AND AGG.idAsignacionSeccion = '$idAssign';");
      $numberRecord = $sql->num_rows;

      if ($numberRecord != 0) {
        $dataArray = array();
        $i = 0;

        while($data = $sql->fetch_assoc()){
          $dataArray[$i] = array("id" => $data['idEstudiante'], "nombre" => $data['nombreEstudiante']);
          $i++;
        }

        header("Content-type: application/json");
        return json_encode($dataArray);
      } else
      {
        $dataArray[0] = array("id" => '-1', "nombre" => 'No Existen Estudiantes En Esta Seccion');
        header("Content-type: application/json");
        return json_encode($dataArray);
      }
    }


  }

  public function fnRecordRatings($value, $rating)
  {
    $db = new ConnectionClass();

    $idBimester = $rating['bimester'];
    $idAssignCourses = $rating['assign'];
    $idAssignSections = $rating['section'];

    $sql = $db->query("INSERT INTO Ratings (idBimester, idAssignCourses, idAssignSections)
                        VALUES ('$idBimester','$idAssignCourses', '$idAssignSections')");

    if ($sql) {

      $idRating = $db->insert_id;
      $verify = '0';
      foreach ($value as list($idStudent, $procedural, $actitudinal, $exam, $totalScore)) {
        $sql = $db->query("INSERT INTO DetailedRatings (idRatigns, idStudent, Procedural, Actitudinal, Exam, TotalScore)
                            VALUES ('$idRating', '$idStudent', '$procedural', '$actitudinal', '$exam', '$totalScore')");

        if (!$sql) {
          $verify = '1';
        }
      }

      if ($verify == '0') {
        return 'Notas Registradas';
      }else {
        return 'Error en el Registro';
      }
    } else{
      return 'Error en el Registro';
    }


  }
}
