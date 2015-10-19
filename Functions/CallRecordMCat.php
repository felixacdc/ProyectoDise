<?php

require_once '../classes/class.FNRecordMCat.php';
require_once '../classes/class.Connection.php';

if (isset($_POST['NomPro'])) {
	$namePost = $_POST['NomPro'];

	$fnProfec = new Record();

	echo $fnProfec->rProfecion($namePost);
}

?>
