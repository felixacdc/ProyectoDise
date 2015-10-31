<?php

require_once '../classes/class.FNCourse.php';
require_once '../classes/class.Connection.php';

if (isset($_POST['frm'])) {

	$fnProfec = new Record();

	switch ($_POST['frm']) {
		case 'frmCourse':
			$namePost = $_POST['NomCourse'];
			echo $fnProfec->fnRegisterCourse($namePost);
			break;

		default:
			echo 'No se encontro el valor';
			break;
}
}else {
	echo 'No existe la variable';
}

 ?>
