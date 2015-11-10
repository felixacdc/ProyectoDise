<?php

require_once '../classes/class.fnReinscription.php';
require_once '../classes/class.Connection.php';

if (isset($_POST['conditional'])) {

  $fnReinscription = new Reinscription();

  switch ($_POST['conditional']) {
    case 'load':
      echo $fnReinscription->fnLoadDataStudent($_POST['idStudent']);
      break;
    case 'searchCycles':
      echo $fnReinscription->fnSearchCycles($_POST['idStudent']);
      break;
    case 'frmReinscription':
      echo $fnReinscription->fnSendReinscription($_POST['idStudent'], $_POST['NameS'], $_POST['AddressS'], $_POST['PhoneS'], $_POST['EmailS'], $_POST['cboAsiGR'], $_POST['cboCE']);
      break;
    case 'frmManStudents':
      echo $fnReinscription->fnSendManStudents($_POST['idStudent'], $_POST['NameS'], $_POST['AddressS'], $_POST['PhoneS'], $_POST['EmailS'], $_POST['cboEstado']);
      break;

  }

}
