<?php

require_once '../classes/class.fnReinscription.php';
require_once '../classes/class.Connection.php';

if (isset($_POST['conditional'])) {

  $fnReinscription = new Reinscription();

  switch ($_POST['conditional']) {
    case 'load':
      echo $fnReinscription->fnLoadDataStudent($_POST['idStudent']);
      break;
  }

}
