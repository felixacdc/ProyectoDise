<?php

require_once '../classes/class.FNCombos.php';
require_once '../classes/class.Connection.php';

if (isset($_POST['cboPost'])) {

  $fnCombos = new Combos();

  switch ($_POST['cboPost']) {
    case 'cboAsigG':
      echo $fnCombos->cboAsigG();
      break;
    case 'cboCE':
      echo $fnCombos->cboCE();
      break;
    case 'cboG':
      echo $fnCombos->cboGrados();
      break;
    case 'cboS':
      echo $fnCombos->cboSeccion();
      break;
    case 'cboProfec':
      echo $fnCombos->cboProfec();
      break;
    case 'CboTipoP':
      echo $fnCombos->cboTipoPago();
      break;
    case 'CboNivelA':
      echo $fnCombos->cboNivelAcademico();
      break;
    case 'CboCourse':
      echo $fnCombos->cboCourse();
      break;
    case 'CboTeacher':
      echo $fnCombos->cboTeacher();
      break;
    case 'cboAsiGgRatings':
      $arrayPost = $_POST['data'];
      echo $fnCombos->cboAsiGgRatings($arrayPost['ciclo'], $arrayPost['teacher']);
      break;
    case 'CboCourseRatings':
      $arrayPost = $_POST['data'];
      echo $fnCombos->CboCourseRatings($arrayPost['ciclo'], $arrayPost['teacher'], $arrayPost['assign']);
      break;
  }

} elseif (isset($_POST['buscarEncar'])) {
  $fnCombos = new Combos();
  echo $fnCombos->buscarEncar($_POST['buscarEncar']);
}

 ?>
