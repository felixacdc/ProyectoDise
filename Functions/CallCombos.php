<?php

require_once '../classes/class.FNCombos.php';
require_once '../classes/class.Connection.php';

if (isset($_POST['cboG'])) {
  $fnCombos = new Combos();

  echo $fnCombos->cboGrados();
} elseif (isset($_POST['cboS'])) {
  $fnCombos = new Combos();

  echo $fnCombos->cboSeccion();
} elseif (isset($_POST['cboAsigG'])) {
  $fnCombos = new Combos();

  echo $fnCombos->cboAsigG();
} elseif (isset($_POST['cboCE'])) {
  $fnCombos = new Combos();

  echo $fnCombos->cboCE();
} elseif (isset($_POST['cboProfec'])) {
  $fnCombos = new Combos();

  echo $fnCombos->cboProfec();
} elseif (isset($_POST['buscarEncar'])) {
  $fnCombos = new Combos();

  echo $fnCombos->buscarEncar($_POST['buscarEncar']);
}

 ?>
