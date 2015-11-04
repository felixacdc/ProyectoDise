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
      return $dataPost;
    }
  }
}
