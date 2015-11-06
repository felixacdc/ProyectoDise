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
}
