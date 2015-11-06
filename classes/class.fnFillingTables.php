<?php

/**
 * CLASE CON FUNCIONES DE USUARIO CATEDRATICO
 */

class FillingTables
{

  public function fnFillingReinscriptions()
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT * FROM estudiantes");

    if ($sql) {

      $dataArray[0] = array("id" => '-1', "nombre" => 'SIIIIII');
      header("Content-type: application/json");
      return json_encode($dataArray);
    }else {
      $dataArray[0] = array("id" => '-1', "nombre" => 'ERROR');
      header("Content-type: application/json");
      return json_encode($dataArray);
    }

  }

}
