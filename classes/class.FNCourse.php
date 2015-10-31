<?php

class Record
{
  public static function depurar($dato, $db){
    return $db->real_escape_string(htmlspecialchars($dato));
  }

  public function fnRegisterCourse($Name){
    $db = new ConnectionClass();

    $TName = $db->real_escape_string(htmlspecialchars($Name));

    $sql = $db->query("INSERT INTO cursos (nombreCurso) VALUES ('$TName')");

    if ($sql) {
      return 'Curso Registrado';
    } else{
      return 'Error en el Registro';
    }
  }
}

 ?>
