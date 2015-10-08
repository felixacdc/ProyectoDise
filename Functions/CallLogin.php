<?php

require_once '../classes/class.Connection.php';
require_once '../classes/class.FNLogin.php';

if (isset($_POST['user']) and isset($_POST['pass'])) {
	$userPost = $_POST['user'];
	$passPost = $_POST['pass'];

	$fnVerify = new Login($userPost, $passPost, 0);

	echo $fnVerify->verifyData();	
} 




?>
