<?php

require_once '../classes/class.fnMaintenanceOfTable.php';
require_once '../classes/class.Connection.php';

if (isset($_POST['modify'])) {

  $fnMaintenance = new Maintenance();

  switch ($_POST['modify']) {
    case 'Degree':
      echo $fnMaintenance->fnModifyDegree($_POST['id'], $_POST['datas']);
      break;
  }

}elseif (isset($_POST['delete'])) {

  $fnMaintenance = new Maintenance();

  switch ($_POST['delete']) {
    case 'Degree':
      echo $fnMaintenance->fnDeleteDegree($_POST['id']);
      break;
  }

}
