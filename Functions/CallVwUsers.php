<?php

require_once '../classes/class.Connection.php';
require_once '../classes/class.FNLogin.php';

if (isset($_POST['hiddenValue'])) {
  $hiddenId = $_POST['hiddenValue'];

  $fnBeginSession = new Login('', '', $hiddenId);
  $fnBeginSession->manageSessions();
} else {
  header('location: ../Index.html');
}



 ?>
