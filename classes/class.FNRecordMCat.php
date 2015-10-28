<?php

class Record
{
  public static function depurar($dato, $db){
    return $db->real_escape_string(htmlspecialchars($dato));
  }

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

  public function rCatedratico($namePost, $addressPost, $phonePost, $emailPost, $profetionPost){
    $db = new ConnectionClass();

    $tName = $this::depurar($namePost, $db);
    $tAddress = $this::depurar($addressPost, $db);
    $tPhone = $this::depurar($phonePost, $db);
    $tEmail = $this::depurar($emailPost, $db);

    $sql = $db->query("INSERT INTO catedraticos (nombreCatedratico, domicilioCatedratico, telefonoCatedratico) VALUES ('$TName')");

    if ($sql) {
      return 'Catedratico RegistradO';
    } else{
      return 'Error en el Registro';
    }

  }

}
