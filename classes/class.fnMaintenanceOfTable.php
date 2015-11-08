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
}
