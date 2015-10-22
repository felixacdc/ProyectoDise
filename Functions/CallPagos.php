<?php

require_once '../classes/class.Connection.php';
require_once '../classes/class.FNPagos.php';

if (isset($_POST['instruction'])) {

	$fnPagos= new Record();

	switch ($_POST['instruction']) {
		case 'pagoCarnet':
			$carnetPost = $_POST['value'];
			echo $fnPagos->vCarnet($carnetPost);
			break;

		default:
				echo 'no se encontro el valor';
				break;
	}
}elseif (isset($_POST['estudiante'])) {
	$fnPagos= new Record();

	$estudiantePost = $_POST['estudiante'];
	$nivelAcademicoPost = $_POST['nivelAcademico'];
	echo $fnPagos->generarDetalleTransaccion($estudiantePost, $nivelAcademicoPost);
}elseif (isset($_POST['ronda'])) {
	$fnPagos= new Record();

	$idEstudiantePost = $_POST['idEstudiante'];
	$idTipoPagoPost = $_POST['idTipoPago'];
	$idNivelAcademicoPost = $_POST['idNivelAcademico'];
	$fechaPost = $_POST['fecha'];
	$idMesPost = $_POST['idMes'];
	$idCicloEscolarPost = $_POST['idCicloEscolar'];
	$subTotalPost = $_POST['subTotal'];
	$idTransaccionPost = $_POST['idTransaccion'];
	$rondaPost = $_POST['ronda'];
	$totalPost = $_POST['total'];

	echo $fnPagos->insertarDetalleT($idEstudiantePost, $idTipoPagoPost, $idNivelAcademicoPost, $fechaPost, $idMesPost, $idCicloEscolarPost, $subTotalPost,$idTransaccionPost, $rondaPost, $totalPost);
}


?>
