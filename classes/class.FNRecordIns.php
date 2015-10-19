<?php

class Record
{

  public function rEncargados($namePost, $addressPost, $phonePost, $emailPost){
    $db = new ConnectionClass();

    $Tname = $db->real_escape_string(htmlspecialchars($namePost));
    $Taddress = $db->real_escape_string(htmlspecialchars($addressPost));
		$Tphone = $db->real_escape_string(htmlspecialchars($phonePost));
		$Temail = $db->real_escape_string(htmlspecialchars($emailPost));

    $sql = $db->query("INSERT INTO encargados (nombreEncargado, domicilioEncargado, numeroContacto, emailContacto) VALUES ('$Tname', '$Taddress', '$Tphone', '$Temail')");

    if ($sql) {
      return 'Grado Registrado Correctamente';
    } else{
      return 'Error en el Registro';
    }
  }

}

 ?>
