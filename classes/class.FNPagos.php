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
		}else {
      $dataArray = array();
		  $dataArray[0] = array("id" => '0', "descripcion" => 'Carnet Invalido');
		}

    header("Content-type: application/json");
    return json_encode($dataArray);
  }

  public function generarDetalleTransaccion($estudiantePost, $nivelAcademicoPost){
    $db = new connectionClass();

    $sql = $db->query("SELECT valorInscripcion, valorColegiatura
                        FROM nivelesacademicos WHERE idnivelAcademico='$nivelAcademicoPost'");
		$numberRecord = $sql->num_rows;

    if ($numberRecord != 0) {
      $dataArray = array();
      $valorInscrip;
      $valorMensual;

			while($data = $sql->fetch_assoc()){
				$valorInscrip = $data['valorInscripcion'];
        $valorMensual = $data['valorColegiatura'];
		  }

      $sql = $db->query("SELECT C.IdCicloEscolar, C.Año, AG.idAsignacionGrados
                          FROM asignaciongrados as AG
                          inner join cicloescolar as C on AG.IdCicloEscolar = C.IdCicloEscolar WHERE AG.IdEstudiante = '$estudiantePost' ORDER BY AG.idAsignacionGrados DESC LIMIT 1");
  		$numberRecord = $sql->num_rows;

      if ($numberRecord != 0) {
        $idCicloE;
        $valorCicloE;

        while($data = $sql->fetch_assoc()){
  				$idCicloE = $data['IdCicloEscolar'];
          $valorCicloE = $data['Año'];
  		  }

        $sql = $db->query("SELECT M.idMes , M.Descripcion, D.iddetalleTransaccion
                            FROM detalletransacciones as D
                            inner join mes as M on D.idMes = M.idMes
                            INNER JOIN transacciones as T on D.idTransaccion = T.idTransaccion
                            WHERE T.IdEstudiante = '$estudiantePost' and D.idCicloEscolar = '$idCicloE'
                            ORDER BY D.iddetalleTransaccion DESC LIMIT 1");
    		$numberRecord = $sql->num_rows;

        if ($numberRecord != 0) {
          $idMes;
          $valorMes;

          while($data = $sql->fetch_assoc()){
    				$idMes = $data['idMes'];
            $valorMes = $data['Descripcion'];
    		  }

          $idMes++;

          $sql = $db->query("SELECT idMes, Descripcion
                              FROM mes WHERE idMes='$idMes'");
      		$numberRecord = $sql->num_rows;

          if ($numberRecord != 0) {
            while($data = $sql->fetch_assoc()){
      				$idMes = $data['idMes'];
              $valorMes = $data['Descripcion'];
      		  }

            $dataArray[0] = array("idMes" => $idMes, "valorMes" => $valorMes,
                                    "idCicloE" => $idCicloE, "valorCicloE" => $valorCicloE,
                                    "valorMensual" => $valorMensual);
          }else {
            $dataArray[1] = array("mensaje" => 'Inscribase en el ciclo escolar actual');
          }

        }else {
          $dataArray[0] = array("idMes" => 0, "valorMes" => 'Inscripcion',
                                  "idCicloE" => $idCicloE, "valorCicloE" => $valorCicloE,
                                  "valorMensual" => $valorInscrip);
        }

        header("Content-type: application/json");
        return json_encode($dataArray);

      }else {
        $dataArray[0] = array("valorMensual" => 'No encontrado');
        header("Content-type: application/json");
        return json_encode($dataArray);
  		}
		}
  }

  public function insertarDetalleT($idEstudiantePost, $idTipoPagoPost, $idNivelAcademicoPost, $fechaPost, $idMesPost, $idCicloEscolarPost, $subTotalPost,$idTransaccionPost, $rondaPost, $totalPost){
    $db = new connectionClass();

    if($rondaPost > 1){

      $sql = $db->query("UPDATE transacciones SET montoTotal = '$totalPost' WHERE idTransaccion = '$idTransaccionPost'");

      if ($sql) {

        $sql = $db->query("INSERT INTO detalletransacciones (idTransaccion, IdMes, IdCicloEscolar, subTotal) VALUES ('$idTransaccionPost', '$idMesPost', '$idCicloEscolarPost', '$subTotalPost')");

        if ($sql) {
          $dataArray[0] = array("idT" => $idTransaccionPost);
        }else {
          $dataArray[1] = array("error" => 'Error en la Transaccion1' . $idTransaccionPost);
        }

        header("Content-type: application/json");
        return json_encode($dataArray);

      } else{
        $dataArray[1] = array("error" => 'Error en la Transaccion');
        header("Content-type: application/json");
        return json_encode($dataArray);
      }

    }else {
      $sql = $db->query("INSERT INTO transacciones (idEstudiante, IdTipoPago, IdNivelAcademico, fechaTransaccion, montoTotal) VALUES ('$idEstudiantePost', '$idTipoPagoPost', '$idNivelAcademicoPost', '$fechaPost', '$totalPost')");

      if ($sql) {
        $idTransaccionPost = $db->insert_id;

        $sql = $db->query("INSERT INTO detalletransacciones (idTransaccion, IdMes, IdCicloEscolar, subTotal) VALUES ('$idTransaccionPost', '$idMesPost', '$idCicloEscolarPost', '$subTotalPost')");

        if ($sql) {
          $dataArray[0] = array("idT" => $idTransaccionPost);
        }else {
          $dataArray[1] = array("error" => 'Error en la Transaccion');
        }

        header("Content-type: application/json");
        return json_encode($dataArray);

      } else{
        $dataArray[1] = array("error" => 'Error en la Transaccion');
        header("Content-type: application/json");
        return json_encode($dataArray);
      }
    }
  }
}

 ?>
