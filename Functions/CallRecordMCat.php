<?php

require_once '../classes/class.FNRecordMCat.php';
require_once '../classes/class.Connection.php';

if (isset($_POST['frm'])) {

	$fnProfec = new Record();

	switch ($_POST['frm']) {
		case 'frmProfecion':
			$namePost = $_POST['NomPro'];
			echo $fnProfec->rProfecion($namePost);
			break;

		default:
			echo 'No se encontro el valor';
			break;
}
}else {
	echo 'No existe la variable';
}

?>
