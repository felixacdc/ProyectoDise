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

    $sql = $db->query("INSERT INTO catedraticos (nombreCatedratico, domicilioCatedratico, telefonoCatedratico, emailCatedratico, Profesiones_idProfesion) VALUES ('$tName', '$tAddress', '$tPhone', '$tEmail', '$profetionPost')");

    if ($sql) {
      $id = $db->insert_id;

      $tuser= $this::fnGenerarUser($tName, 1) . '-t' . rand(1, 50) . date('d') . date('s')  ;
      $tcontra = 'teacher' . rand(1, 100);

      $sqlUser = $db->query("INSERT INTO usuarios (usuario, contraseña, idTipoUsuario, idCatedratico)
                                        VALUES ('$tuser', '$tcontra', '3', '$id')");

      if ($sqlUser) {
        $dataArray[0] = array("mensaje" => 'Catedratico Registrado', "usuario" => $tuser, "contraseña" => $tcontra);

        header("Content-type: application/json");
        return json_encode($dataArray);
      }else{
        #
      }
    } else{
      #
    }

  }

  public function verityProfession($id, $values){
    $db = new ConnectionClass();

    $sql = $db->query("SELECT * FROM profesiones WHERE Profesion='$values[0]' AND idProfesion!='$id'");
    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      return 'Profesion Ya Existente';
    }else {
      return '';
    }
  }

  public static function fnGenerarUser($string ,$number){
    $subString = explode(" ", $string);

    $unionString = '';

    foreach ($subString as $valor) {
        $unionString.= substr(strtolower($valor), 0, $number);
    }

    return $unionString;
  }

}
