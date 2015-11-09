<?php

require_once '../classes/class.Connection.php';
require_once '../classes/class.fnStudent.php';

if (isset($_POST['fnPOST'])) {

  $fnStudent = new Students();

  switch ($_POST['fnPOST']) {
    case 'idUser':
      echo $fnStudent->fnSearchIdStudent($_POST["idUser"]);
      break;
    case 'frmViewRatings':
      echo $fnStudent->fnViewRatings($_POST["data"]);
      break;
    case 'searchPayment':
      echo $fnStudent->fnSearchPayment($_POST["data"]);
      break;
  }
}
