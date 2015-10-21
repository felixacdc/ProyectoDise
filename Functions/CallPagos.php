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
}


?>
