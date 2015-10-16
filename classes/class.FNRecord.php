<?php

class Record
{
  public function vGrado($Grad){
    $db = new ConnectionClass();

    $Tgrad = $db->real_escape_string(htmlspecialchars($Grad));

    $sql = $db->query("SELECT * FROM grado WHERE descripcion='$Tgrad'");
    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      return 'Grado Ya Existente';
    }else {
      return '';
    }
  }

  public function vSec($Sec){
    $db = new ConnectionClass();

    $TSec = $db->real_escape_string(htmlspecialchars($Sec));

    $sql = $db->query("SELECT * FROM Seccion WHERE descripcion='$TSec'");
    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      return 'Seccion Ya Existente';
    }else {
      return '';
    }
  }

  public function rGrad($Grado){
    $db = new ConnectionClass();

    $TGrad = $db->real_escape_string(htmlspecialchars($Grado));

    $sql = $db->query("INSERT INTO grado (descripcion) VALUES ('$TGrad')");

    if ($sql) {
      return 'Grado Registrado Correctamente';
    }
  }
}

 ?>