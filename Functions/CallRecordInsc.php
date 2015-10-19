<?php

require_once '../classes/class.FNRecordIns.php';
require_once '../classes/class.Connection.php';

if (isset($_POST['NameE']) and isset($_POST['AddressE']) and isset($_POST['PhoneE']) and isset($_POST['EmailE'])) {
	$namePost = $_POST['NameE'];
	$addressPost = $_POST['AddressE'];
  $phonePost = $_POST['PhoneE'];
	$emailPost = $_POST['EmailE'];

	$fnEncar = new Record();

	echo $fnEncar->rEncargados($namePost, $addressPost, $phonePost, $emailPost);
}

?>
