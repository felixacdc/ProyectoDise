<?php

class Combos
{
  public function cboGrados(){
		$db = new connectionClass();

		$sql = $db->query("SELECT * FROM grado");
		$numberRecord = $sql->num_rows;

		if ($numberRecord != 0) {
			$dataArray = array();
			$i = 0;

      $dataArray[$i] = array("id" => 0 , "descripcion" => 'Seleccione el Grado');

			while($data = $sql->fetch_assoc()){
        $i++;
				$dataArray[$i] = array("id" => $data['idGrado'], "descripcion" => $data['Descripcion']);
			}

			header("Content-type: application/json");
			return json_encode($dataArray);
		}
	}
}

 ?>
