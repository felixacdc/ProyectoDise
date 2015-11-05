<?php

require_once '../classes/class.fnRatings.php';
require_once '../classes/class.Connection.php';

if (isset($_POST['conditional'])) {

  $fnRatings = new Ratings();

  switch ($_POST['conditional']) {
    case 'loadStudents':
      echo $fnRatings->fnLoadStudents($_POST['idAssign'], $_POST['idciclo']);
      break;
    case 'frmRatings':
      echo $fnRatings->fnRecordRatings($_POST['array'], $_POST['rating']);
      break;
  }

}
