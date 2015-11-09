<?php

/**
 *FUNCIONES DE MANTENIMIENTOS
 */
class Maintenance
{

  public static function depurar($dato, $db){
    return $db->real_escape_string(htmlspecialchars($dato));
  }

  public function fnModifyDegree($id, $element)
  {
    $db = new ConnectionClass();

    $tname = $this::depurar($element, $db);

    $sql = $db->query("UPDATE grado
                        SET Descripcion = '$tname'
                        WHERE idGrado = '$id'");

    if ($sql) {

      return 'Modificacion Correcta';

    } else{
      return 'Error en el Registro';
    }
  }

  public function fnModifySection($id, $element)
  {
    $db = new ConnectionClass();

    $tname = $this::depurar($element, $db);

    $sql = $db->query("UPDATE Seccion
                        SET Descripcion = '$tname'
                        WHERE idSeccion = '$id'");

    if ($sql) {

      return 'Modificacion Correcta';

    } else{
      return 'Error en el Registro';
    }
  }

  public function fnModifyAssignSection($id, $values)
  {
    $db = new ConnectionClass();

    $sql = $db->query("UPDATE AsignacionSeccion
                        SET idSeccion='$values[1]', idGrado='$values[0]'
                        WHERE idAsignacionSeccion='$id'");

    if ($sql) {

      return 'Modificacion Correcta';

    } else{
      return 'Error en el Registro';
    }
  }

  public function fnModifyCourse($id, $values)
  {
    $db = new ConnectionClass();

    $sql = $db->query("UPDATE cursos
                        SET nombreCurso='$values[0]'
                        WHERE idCurso='$id'");

    if ($sql) {

      return 'Modificacion Correcta';

    } else{
      return 'Error en el Registro';
    }
  }

  public function fnModifyAssignCourse($id, $values)
  {
    $db = new ConnectionClass();

    $sql = $db->query("UPDATE asignacioncursos
                        SET IdCatedratico='$values[0]', IdCurso='$values[1]', IdGrado='$values[2]', idCicloEscolar='$values[3]'
                        WHERE idAsignacionCursos='$id'");

    if ($sql) {

      return 'Modificacion Correcta';

    } else{
      return 'Error en el Registro';
    }
  }

  public function fnDeleteDegree($id)
  {
    $db = new ConnectionClass();

    $sql = $db->query("DELETE FROM grado
                        WHERE idGrado = '$id'");

    if ($sql) {

      return 'Eliminacion Correcta';

    } else{
      return 'No se puede realizar la eliminacion';
    }
  }

  public function fnDeleteSection($id)
  {
    $db = new ConnectionClass();

    $sql = $db->query("DELETE FROM Seccion
                        WHERE idSeccion = '$id'");

    if ($sql) {

      return 'Eliminacion Correcta';

    } else{
      return 'No se puede realizar la eliminacion';
    }
  }

  public function fnDeleteAssignSection($id)
  {
    $db = new ConnectionClass();

    $sql = $db->query("DELETE FROM AsignacionSeccion
                        WHERE idAsignacionSeccion='$id'");

    if ($sql) {

      return 'Eliminacion Correcta';

    } else{
      return 'No se puede realizar la eliminacion';
    }
  }

  public function fnDeleteCourse($id)
  {
    $db = new ConnectionClass();

    $sql = $db->query("DELETE FROM cursos
                        WHERE IdCurso='$id'");

    if ($sql) {

      return 'Eliminacion Correcta';

    } else{
      return 'No se puede realizar la eliminacion';
    }
  }

  public function fnDeleteAssignCourse($id)
  {
    $db = new ConnectionClass();

    $sql = $db->query("DELETE FROM asignacioncursos
                        WHERE idAsignacionCursos='$id'");

    if ($sql) {

      return 'Eliminacion Correcta';

    } else{
      return 'No se puede realizar la eliminacion';
    }
  }
}
