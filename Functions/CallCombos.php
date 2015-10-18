<?php

require_once '../classes/class.FNCombos.php';
require_once '../classes/class.Connection.php';

if (isset($_POST['cboG'])) {
  $fnCombos = new Combos();

  echo $fnCombos->cboGrados();
} elseif (isset($_POST['cboS'])) {
  $fnCombos = new Combos();

  echo $fnCombos->cboSeccion();
}

 ?>
