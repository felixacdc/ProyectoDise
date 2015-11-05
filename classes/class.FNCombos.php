<?php
class Combos
{

  /*-----------------------------------------------------
  			LLENADO DE COMBOS REFERIDOS A GRADOS
  ----------------------------------------------------------*/
  public function cboGrados(){
		$db = new connectionClass();

		$sql = $db->query("SELECT * FROM grado");
		$numberRecord = $sql->num_rows;

		if ($numberRecord != 0) {
			$dataArray = array();
			$i = 0;

      $dataArray[$i] = array("id" => '0' , "descripcion" => 'Seleccione el Grado');

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

      $dataArray[$i] = array("id" => '0' , "descripcion" => 'Seleccione el Seccion');

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

      $dataArray[$i] = array("id" => '0' , "descripcion" => 'Seleccione el Grado');

			while($data = $sql->fetch_assoc()){
        $i++;
				$dataArray[$i] = array("id" => $data['idAsignacionSeccion'], "descripcion" => $data['GDesc'] . " | " . $data['Descripcion']);
			}

			header("Content-type: application/json");
			return json_encode($dataArray);
		}
	}

  /*-----------------------------------------------------
  			LLENADO DE COMBOS REFERIDOS A INSCRIPCION
  ----------------------------------------------------------*/
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

      $dataArray[$i] = array("id" => '0' , "descripcion" => 'Seleccione el Ciclo Escolar');

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


  public function buscarEncar($buscar){
  		$db = new connectionClass();

  		$sql = $db->query("SELECT idEncargado, nombreEncargado FROM encargados WHERE nombreEncargado LIKE '%$buscar%'");
  		$numberRecord = $sql->num_rows;

  		if ($numberRecord != 0) {
  			$dataArray = array();
  			$i = 0;

  			while($data = $sql->fetch_assoc()){
  				$dataArray[$i] = array("id" => $data['idEncargado'], "descripcion" => $data['nombreEncargado']);
          $i++;
  			}

  			header("Content-type: application/json");
  			return json_encode($dataArray);
  		}
  	}

  /*-----------------------------------------------------
        LLENADO DE COMBOS REFERIDOS A CATEDRATICOS
  ----------------------------------------------------------*/

  public function cboProfec(){
		$db = new connectionClass();

		$sql = $db->query("SELECT * FROM profesiones");
		$numberRecord = $sql->num_rows;

		if ($numberRecord != 0) {
			$dataArray = array();
			$i = 0;

      $dataArray[$i] = array("id" => '0' , "descripcion" => 'Seleccione La Profecion');

			while($data = $sql->fetch_assoc()){
        $i++;
				$dataArray[$i] = array("id" => $data['idProfesion'], "descripcion" => $data['Profesion']);
			}

			header("Content-type: application/json");
			return json_encode($dataArray);
		}
	}

  /*-----------------------------------------------------
        LLENADO DE COMBOS REFERIDOS A PAGOS
  ----------------------------------------------------------*/

  public function cboTipoPago(){
		$db = new connectionClass();

		$sql = $db->query("SELECT * FROM tipopago");
		$numberRecord = $sql->num_rows;

		if ($numberRecord != 0) {
			$dataArray = array();
			$i = 0;

      $dataArray[$i] = array("id" => '0' , "descripcion" => 'Seleccione el Tipo de Pago');

			while($data = $sql->fetch_assoc()){
        $i++;
				$dataArray[$i] = array("id" => $data['idTipoPago'], "descripcion" => $data['Descripcion']);
			}

			header("Content-type: application/json");
			return json_encode($dataArray);
		}
	}

  public function cboNivelAcademico(){
		$db = new connectionClass();

		$sql = $db->query("SELECT * FROM nivelesacademicos");
		$numberRecord = $sql->num_rows;

		if ($numberRecord != 0) {
			$dataArray = array();
			$i = 0;

      $dataArray[$i] = array("id" => '0' , "descripcion" => 'Seleccione el Nivel Academico');

			while($data = $sql->fetch_assoc()){
        $i++;
				$dataArray[$i] = array("id" => $data['idnivelAcademico'], "descripcion" => $data['nivelAcademico']);
			}

			header("Content-type: application/json");
			return json_encode($dataArray);
		}
	}

  /*-----------------------------------------------------
        LLENADO DE COMBOS REFERIDOS A CURSOS
  ----------------------------------------------------------*/

  public function cboCourse(){
		$db = new connectionClass();

		$sql = $db->query("SELECT * FROM cursos");
		$numberRecord = $sql->num_rows;

		if ($numberRecord != 0) {
			$dataArray = array();
			$i = 0;

      $dataArray[$i] = array("id" => '0' , "descripcion" => 'Seleccione el Curso');

			while($data = $sql->fetch_assoc()){
        $i++;
				$dataArray[$i] = array("id" => $data['idCurso'], "descripcion" => $data['nombreCurso']);
			}

			header("Content-type: application/json");
			return json_encode($dataArray);
		}
	}

  public function cboTeacher(){
		$db = new connectionClass();

		$sql = $db->query("SELECT idCatedratico, nombreCatedratico FROM catedraticos");
		$numberRecord = $sql->num_rows;

		if ($numberRecord != 0) {
			$dataArray = array();
			$i = 0;

      $dataArray[$i] = array("id" => '0' , "descripcion" => 'Seleccione el Catedratico');

			while($data = $sql->fetch_assoc()){
        $i++;
				$dataArray[$i] = array("id" => $data['idCatedratico'], "descripcion" => $data['nombreCatedratico']);
			}

			header("Content-type: application/json");
			return json_encode($dataArray);
		}
	}

  /*-----------------------------------------------------
        LLENADO DE COMBOS INGRESO DE NOTAS
  ----------------------------------------------------------*/
  public function cboAsiGgRatings($idCicloPOST, $idTeacherPOST){
    $db = new connectionClass();

		$sql = $db->query("SELECT AGC.IdGrado, G.descripcion, AGS.idAsignacionSeccion, S.descripcion as descriptionS
                        FROM asignacioncursos as AGC
                        INNER JOIN grado as G on AGC.idGrado = G.idGrado
                        INNER JOIN AsignacionSeccion as AGS on AGS.idGrado = G.idGrado
                        inner join Seccion as S on S.idSeccion = AGS.idSeccion
                        WHERE idCicloEscolar = '$idCicloPOST' AND idCatedratico = '$idTeacherPOST'
                        GROUP BY AGC.IdGrado, G.descripcion, AGS.idAsignacionSeccion, S.idSeccion");

		$numberRecord = $sql->num_rows;

		if ($numberRecord != 0) {
			$dataArray = array();
			$i = 0;

      $dataArray[$i] = array("id" => '0' , "descripcion" => 'Seleccione el Grado');

			while($data = $sql->fetch_assoc()){
        $i++;
				$dataArray[$i] = array("id" => $data['idAsignacionSeccion'], "descripcion" => $data['descripcion'] . " | " . $data['descriptionS']);
			}

			header("Content-type: application/json");
			return json_encode($dataArray);
		}
	}

  public function CboCourseRatings($idCicloPOST, $idTeacherPOST, $idAssign){
		$db = new connectionClass();

		$sql = $db->query("SELECT AGC.idAsignacionCursos, C.nombreCurso
                        FROM AsignacionSeccion AS AGS
                        INNER JOIN grado AS G ON AGS.idGrado = G.idGrado
                        INNER JOIN asignacioncursos AS AGC ON G.idGrado = AGC.idGrado
                        INNER JOIN cursos AS C ON AGC.idCurso = C.idCurso
                        WHERE AGS.idAsignacionSeccion = '$idAssign' AND AGC.idCicloEscolar = '$idCicloPOST' AND AGC.idCatedratico = '$idTeacherPOST'");
		$numberRecord = $sql->num_rows;

		if ($numberRecord != 0) {
			$dataArray = array();
			$i = 0;

      $dataArray[$i] = array("id" => '0' , "descripcion" => 'Seleccione el Curso');

			while($data = $sql->fetch_assoc()){
        $i++;
				$dataArray[$i] = array("id" => $data['idAsignacionCursos'], "descripcion" => $data['nombreCurso']);
			}

			header("Content-type: application/json");
			return json_encode($dataArray);
		}
	}

  public function cboBimester(){
		$db = new connectionClass();

		$sql = $db->query("SELECT idBimester, Description FROM Bimester");
		$numberRecord = $sql->num_rows;

		if ($numberRecord != 0) {
			$dataArray = array();
			$i = 0;

      $dataArray[$i] = array("id" => '0' , "descripcion" => 'Seleccione el Catedratico');

			while($data = $sql->fetch_assoc()){
        $i++;
				$dataArray[$i] = array("id" => $data['idBimester'], "descripcion" => $data['Description']);
			}

			header("Content-type: application/json");
			return json_encode($dataArray);
		}
	}
}

 ?>
