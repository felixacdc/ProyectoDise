<?php

require_once '../classes/class.Connection.php';
require_once '../classes/class.FNRecordIns.php';

if (isset($_POST['frm'])) {

	$fnEncar = new Record();

	switch ($_POST['frm']) {
		case 'frmEncargado':
			$namePost = $_POST['NameE'];
			$addressPost = $_POST['AddressE'];
			$phonePost = $_POST['PhoneE'];
			$emailPost = $_POST['EmailE'];
			echo $fnEncar->rEncargados($namePost, $addressPost, $phonePost, $emailPost);
			break;
		case 'frmInscripcion':
			$encargado = $_POST['valEncargado'];
			$namePost = $_POST['NameS'];
			$addressPost = $_POST['AddressS'];
			$phonePost = $_POST['PhoneS'];
			$emailPost = $_POST['EmailS'];
			$asignacionSeccion = $_POST['cboAsiGR'];
			$cicloEscolar = $_POST['cboCE'];
			echo $fnEncar->rInscripcion($namePost, $addressPost, $phonePost, $emailPost, $asignacionSeccion,
																	$cicloEscolar, $encargado);
			break;

		default:
				echo 'no se encontro el valor';
				break;
	}
}else {
	echo 'no existe la variable';
}


?>
