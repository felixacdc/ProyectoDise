<?php

/**
 *FUNCIONES DE REINSCRIPCION DE ALUMNOS
 */
class Reinscription
{

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
    }
  }
}
