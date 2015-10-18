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

      $dataArray[$i] = array("id" => '' , "descripcion" => 'Seleccione el Grado');

			while($data = $sql->fetch_assoc()){
        $i++;
				$dataArray[$i] = array("id" => $data['idGrado'], "descripcion" => $data['Descripcion']);
			}

			header("Content-type: application/json");
			return json_encode($dataArray);
		}
	}

  public function cboSeccion(){
		$db = new connectionClass();

		$sql = $db->query("SELECT * FROM Seccion");
		$numberRecord = $sql->num_rows;

		if ($numberRecord != 0) {
			$dataArray = array();
			$i = 0;

      $dataArray[$i] = array("id" => '' , "descripcion" => 'Seleccione el Seccion');

			while($data = $sql->fetch_assoc()){
        $i++;
				$dataArray[$i] = array("id" => $data['idSeccion'], "descripcion" => $data['Descripcion']);
			}

			header("Content-type: application/json");
			return json_encode($dataArray);
		}
	}

  public function cboAsigG(){
		$db = new connectionClass();

		$sql = $db->query("SELECT AG.idAsignacionSeccion, G.descripcion as GDesc, S.Descripcion
                        FROM AsignacionSeccion as AG
                        inner join grado as G on AG.idGrado = G.idGrado
                        inner join Seccion as S on S.idSeccion = AG.idSeccion ORDER BY GDesc asc");
		$numberRecord = $sql->num_rows;

		if ($numberRecord != 0) {
			$dataArray = array();
			$i = 0;

      $dataArray[$i] = array("id" => '' , "descripcion" => 'Seleccione el Grado');

			while($data = $sql->fetch_assoc()){
        $i++;
				$dataArray[$i] = array("id" => $data['idAsignacionSeccion'], "descripcion" => $data['GDesc'] . " | " . $data['Descripcion']);
			}

			header("Content-type: application/json");
			return json_encode($dataArray);
		}
	}

  public function regCboCE($año, $numberRecord){
    $db = new ConnectionClass();

    $año2 = $año+1;

    if ($numberRecord == 0) {
      $sql = $db->query("INSERT INTO cicloescolar (Año) VALUES ('$año'),('$año2')");

      if ($sql) {
        $this->cboCE();
      }
    } elseif ($numberRecord == 1) {
      $sql = $db->query("INSERT INTO cicloescolar (Año) VALUES ('$año2')");

      if ($sql) {
        $this->cboCE();
      }
    }


  }

  public function cboCE(){
		$db = new connectionClass();

    $año = date('Y');

		$sql = $db->query("SELECT * FROM cicloescolar WHERE Año = $año OR Año = ($año+1)");
		$numberRecord = $sql->num_rows;

		if ($numberRecord == 2) {
			$dataArray = array();
			$i = 0;

      $dataArray[$i] = array("id" => '' , "descripcion" => 'Seleccione el Ciclo Escolar');

			while($data = $sql->fetch_assoc()){
        $i++;
        $dataArray[$i] = array("id" => $data['idCicloEscolar'], "descripcion" => $data['Año']);
			}

			header("Content-type: application/json");
			return json_encode($dataArray);
		}else {
		  $this->regCboCE($año, $numberRecord);
		}
	}
}

 ?>
