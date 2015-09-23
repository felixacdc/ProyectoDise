<?php

require_once '../classes/class.Connection.php';
require_once '../classes/class.FNLogin.php';

// $user = $_POST['euser'];
// $pass = $_POST['epass'];

$fnVerify = new Login('Direc01', '123');

echo $fnVerify->verifyData();

?>
