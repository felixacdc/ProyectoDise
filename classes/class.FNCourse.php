<?php

class Record
{
  public static function depurar($dato, $db)
  {
    return $db->real_escape_string(htmlspecialchars($dato));
  }

  public function fnRegisterCourse($Name)
  {
    $db = new ConnectionClass();

    $TName = $db->real_escape_string(htmlspecialchars($Name));

    $sql = $db->query("INSERT INTO cursos (nombreCurso)
                        VALUES ('$TName')");

    if ($sql) {
      return 'Curso Registrado';
    } else{
      return 'Error en el Registro';
    }
  }

  public function fnRegisterAssignCourse($degreePost, $coursePost, $teacherPost, $schoolYearPost)
  {
    $db = new ConnectionClass();

    $sql = $db->query("INSERT INTO asignacioncursos (IdGrado, IdCurso, IdCatedratico, idCicloEscolar)
                        VALUES ('$degreePost', '$coursePost', '$teacherPost', '$schoolYearPost')");

    if ($sql) {
      return 'Asigancion de Curso Registrada';
    } else{
      return 'Error en el Registro';
    }
  }

  public function verityCourses($id, $values)
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT * FROM cursos
                        WHERE nombreCurso='$values[0]' AND idCurso!='$id'");
    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      return 'Curso Ya Existente';
    }else {
      return '';
    }
  }

  public function verityAssignCourses($id, $values)
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT * FROM asignacioncursos
                        WHERE IdCatedratico='$values[0]' AND IdCurso='$values[1]' AND IdGrado='$values[2]'
                        AND IdCatedratico='$values[3]' AND idAsignacionCursos!='$id'");
    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      return 'Asignacion de Curso ya Existente';
    }else {
      return '';
    }
  }

}
