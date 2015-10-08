<?php

require_once '../classes/class.Connection.php';
require_once '../classes/class.FNLogin.php';

if (isset($_POST['hiddenValue'])) {
  $hiddenId = $_POST['hiddenValue'];

  $fnBeginSession = new Login('', '', $hiddenId);
  $fnBeginSession->manageSessions();
} elseif(isset($_GET['close'])) {
	$fnCloseSession = new Login('', '', '');
  	$fnCloseSession->closeSessions();
}else {
  header('location: ../Index.html');
}



 ?>
