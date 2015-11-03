<?php

require_once '../classes/class.Connection.php';
require_once '../classes/class.fnTeacher.php';

if (isset($_POST['fnPOST'])) {

  $fnTeacher = new Teachers();

  switch ($_POST['fnPOST']) {
    case 'idUser':

      echo $fnTeacher->fnSearchIdTeacher($_POST["idUser"]);
      break;
  }
}


 ?>
