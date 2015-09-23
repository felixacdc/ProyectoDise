<?php

require_once '../classes/class.Connection.php';
require_once '../classes/class.FNLogin.php';

$userPost = $_POST['user'];
$passPost = $_POST['pass'];

$fnVerify = new Login($userPost, $passPost);

echo $fnVerify->verifyData();

?>
