<?php

require_once '../classes/class.Connection.php';
require_once '../classes/class.FNLogin.php';

$hiddenId = $_POST['hiddenValue'];

$fnBeginSession = new Login('', '', $hiddenId);
$fnBeginSession->manageSessions();


 ?>
