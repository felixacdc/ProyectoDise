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
      return 'Encargado Registrado Correctamente';
    } else{
      return 'Error en el Registro';
    }
  }

  public function rInscripcion($namePost, $addressPost, $phonePost, $emailPost, $asignacionSeccion, $cicloEscolar, $encargado){
    $db = new ConnectionClass();
    $dataArray = array();

    $tname = $this::depurar($namePost, $db);
    $taddress = $this::depurar($addressPost, $db);
    $tphone = $this::depurar($phonePost, $db);
    $temail = $this::depurar($emailPost, $db);

    $tcarnet = $this::fnGenerarUser($tname, 2) . '-' . date('y') . '-' . rand(1, 5000);

    $sql = $db->query("INSERT INTO estudiantes (nombreEstudiante, direccionEstudiante, telefonoEstudiante,
                                    emailEstudiante, idEncargado, idEstado, numeroCarne)
                        VALUES ('$tname', '$taddress', '$tphone', '$temail', '$encargado', '1', '$tcarnet')");

    if ($sql) {
      $id = $db->insert_id;

      $sqlAsginacionGrado = $db->query("INSERT INTO asignaciongrados (IdEstudiante, IdCicloEscolar,
                                        idAsignacionSeccion)
                                        VALUES ('$id', '$cicloEscolar', '$asignacionSeccion')");
      if ($sqlAsginacionGrado) {
        $idAG = $db->insert_id;

        $tuser= $this::fnGenerarUser($tname, 1) . '-' . rand(1, 100) . date('d') . date('s')  ;
        $tcontra = 'study' . rand(1, 100);

        $sqlUser = $db->query("INSERT INTO usuarios (usuario, contraseña, idTipoUsuario, idEstudiante)
                                          VALUES ('$tuser', '$tcontra', '4', '$id')");

        if ($sqlUser) {
          $dataArray[0] = array("mensaje" => 'Estudiante Registrado', "carnet" => $tcarnet, "usuario" => $tuser, "contraseña" => $tcontra);

          header("Content-type: application/json");
          return json_encode($dataArray);
        } else {
          #
        }
      }else {
          #
      }
    } else{
      #
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

  public static function depurar($dato, $db){
    return $db->real_escape_string(htmlspecialchars($dato));
  }

}


 ?>
