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

		case 'frmCatedratico':
			$namePost = $_POST['NomCat'];
			$addressPost = $_POST['AddressCat'];
			$phonePost = $_POST['PhoneCat'];
			$emailPost = $_POST['EmailCat'];
			$profetionPost = $_POST['cbopro'];

			echo $fnProfec->rCatedratico($namePost, $addressPost, $phonePost, $emailPost, $profetionPost);
			break;
		case 'Profession':
			echo $fnProfec->verityProfession($_POST['id'], $_POST['datas']);
			break;

		default:
			echo 'No se encontro el valor';
			break;
}
}else {
	echo 'No existe la variable';
}

?>
