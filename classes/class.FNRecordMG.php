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
    } else{
      return 'Error en el Registro';
    }
  }

  public function rSeccion($Seccion){
    $db = new ConnectionClass();

    $TSeccion = $db->real_escape_string(htmlspecialchars($Seccion));

    $sql = $db->query("INSERT INTO Seccion (descripcion) VALUES ('$TSeccion')");

    if ($sql) {
      return 'Seccion Registrada Correctamente';
    } else{
      return 'Error en el Registro';
    }
  }

  public function rAsignacionGS($Seccion, $Grado){
    $db = new ConnectionClass();

    $sql = $db->query("INSERT INTO AsignacionSeccion (idGrado, idSeccion) VALUES ('$Grado', '$Seccion')");

    if ($sql) {
      return 'Seccion Asignada Correctamente';
    } else{
      return 'Error en el Registro';
    }
  }

  public function vAsignacionGS($Seccion, $Grado){
    $db = new ConnectionClass();

    $sql = $db->query("SELECT * FROM AsignacionSeccion WHERE idSeccion = '$Seccion' and idGrado = '$Grado'");
    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      return 'Seccion Ya Asignada a ese grado';
    }else {
      return '';
    }
  }

  public function verityGrado($id, $Grad){
    $db = new ConnectionClass();

    $Tgrad = $db->real_escape_string(htmlspecialchars($Grad));

    $sql = $db->query("SELECT * FROM grado WHERE descripcion='$Tgrad' AND idGrado!='$id'");
    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      return 'Grado Ya Existente';
    }else {
      return '';
    }
  }

  public function veritySection($id, $Section)
  {
    $db = new ConnectionClass();

    $tSection = $db->real_escape_string(htmlspecialchars($Section));

    $sql = $db->query("SELECT * FROM Seccion WHERE descripcion='$tSection' AND idSeccion!='$id'");
    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      return 'Seccion Ya Existente';
    }else {
      return '';
    }
  }

  public function verityAssignSection($id, $values)
  {
    $db = new ConnectionClass();

    $idGrado = $values[0];
    $idSeccion = $values[1];

    $sql = $db->query("SELECT * FROM AsignacionSeccion
                        WHERE idSeccion='$idSeccion' AND idGrado='$idGrado' AND idAsignacionSeccion!='$id'");
    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      return 'Asignacion Ya Existente';
    }else {
      return '';
    }
  }
}

 ?>
