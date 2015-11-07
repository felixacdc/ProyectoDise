<?php

/**
 *FUNCIONES DE REINSCRIPCION DE ALUMNOS
 */
class Reinscription
{

  function fnLoadDataStudent($idStudent)
  {
    $dataArray[0] = array("id" => '-1', "nombre" => 'SIIII');
    header("Content-type: application/json");
    return json_encode($dataArray);
  }
}
