<?php

require_once '../classes/class.Connection.php';
require_once '../classes/class.fnFillingTables.php';

if (isset($_POST['conditional'])) {

  $fnStudent = new FillingTables();

  switch ($_POST['conditional']) {
    case 'tableAssignSection':
      echo $fnStudent->fnFillingAssignSection();
      break;
  }
}
