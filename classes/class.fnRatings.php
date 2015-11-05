<?php

/**
 * FUNCIONES DE Calificaciones
 */
class Ratings
{

  public function fnLoadStudents($idAssign, $idCiclo)
  {
    $db = new ConnectionClass();

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
    }
  }

  public function fnRecordRatings($value)
  {
    
    echo 'SIIIIIIIII';
  }
}
