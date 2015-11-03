<?php

/**
 * CLASE CON FUNCIONES DE USUARIO CATEDRATICO
 */

class Teachers
{

  function fnSearchIdTeacher($idUserPOST)
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT idCatedratico FROM usuarios WHERE usuario='$idUserPOST'");

    if ($sql) {
      $data = $sql->fetch_assoc();

      return $data['idCatedratico'];
    }else {
      return 'error';
    }

  }
}
