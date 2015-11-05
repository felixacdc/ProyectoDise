<?php
/**
 * VERIFICACIONES DE DATOS REPETIDOS
 */
class Verify
{

  public static function depurar($dato, $db){
    return $db->real_escape_string(htmlspecialchars($dato));
  }

  function fnProfessions($dataPost)
  {
    $db = new ConnectionClass();

    $tData = $this::depurar($dataPost, $db);

    $sql = $db->query("SELECT * FROM profesiones WHERE Profesion='$tData'");
    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      return 'Profecion Ya Existente';
    }else {
      return '';
    }
  }

  function fnCourses($dataPost)
  {
    $db = new ConnectionClass();

    $tData = $this::depurar($dataPost, $db);

    $sql = $db->query("SELECT * FROM cursos WHERE nombreCurso = '$tData'");
    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      return 'El Curso Ya Existente';
    }else {
      return '';
    }
  }

  function fnAssignCourses($idCicloPost, $idCursoPost, $idGradoPost)
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT * FROM asignacioncursos
                        WHERE idCicloEscolar = '$idCicloPost' AND idGrado = '$idGradoPost' AND idCurso = '$idCursoPost';");
    $numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      return 'La Asignacion de Curso ya Existente en este Grado';
    }else {
      return '';
    }
  }
}
