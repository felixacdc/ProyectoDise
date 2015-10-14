<?php 

require_once '../classes/class.Connection.php';

if (isset($_POST['rGrad'])) {
	// $userPost = $_POST['user'];
	// $passPost = $_POST['pass'];

	// $fnVerify = new Login($userPost, $passPost, 0);

	// echo $fnVerify->verifyData();
	echo 'Siiiii';	
} elseif (isset($_POST['rSec'])) {
	echo 'NOOOOOO';
}

 ?>