<?php

class Record
{
  public static function depurar($dato, $db){
    return $db->real_escape_string(htmlspecialchars($dato));
  }

  public function vCarnet($carnetPost){
    $db = new connectionClass();

    $tCarnet = $this::depurar($carnetPost, $db);

		$sql = $db->query("SELECT idEstudiante, nombreEstudiante FROM estudiantes WHERE numeroCarne='$tCarnet'");
		$numberRecord = $sql->num_rows;

		if ($numberRecord != 0) {
      $dataArray = array();
			$i = 0;

			while($data = $sql->fetch_assoc()){
				$dataArray[$i] = array("id" => $data['idEstudiante'], "descripcion" => $data['nombreEstudiante']);
        $i++;
			}

			header("Content-type: application/json");
			return json_encode($dataArray);
		}
  }
}

 ?>
