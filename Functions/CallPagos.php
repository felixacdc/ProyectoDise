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
}else {
	echo 'no existe la variable';
}


?>
