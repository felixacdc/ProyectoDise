<?php

class Record
{
    public function rProfecion($Name){
      $db = new ConnectionClass();

      $TName = $db->real_escape_string(htmlspecialchars($Name));

      $sql = $db->query("INSERT INTO profesiones (Profesion) VALUES ('$TName')");

      if ($sql) {
        return 'Profecion Registrada';
      } else{
        return 'Error en el Registro';
      }
    }

}
