<?php

require_once '../classes/class.FNRecordMG.php';
require_once '../classes/class.Connection.php';

if (isset($_POST['rGrad'])) {
	$gradPost = $_POST['rGrad'];

	$fnGrad = new Record();

	echo $fnGrad->vGrado($gradPost);
} elseif (isset($_POST['rSec'])) {
	$secPost = $_POST['rSec'];

	$fnSec = new Record();

	echo $fnSec->vSec($secPost);
} elseif (isset($_POST['txtGradE'])) {
	$gradPost = $_POST['txtGradE'];

	$fnGrad = new Record();

	echo $fnGrad->rGrad($gradPost);
} elseif (isset($_POST['NameS'])) {
	$secPost = $_POST['NameS'];

	$fnSec = new Record();

	echo $fnSec->rSeccion($secPost);
} elseif (isset($_POST['cboGrado']) and isset($_POST['cboseccion'])) {
	$gradPost = $_POST['cboGrado'];
	$secPost = $_POST['cboseccion'];

	$fnSec = new Record();

	echo $fnSec->rAsignacionGS($secPost, $gradPost);
} elseif (isset($_POST['vGrad']) and isset($_POST['vSec'])) {
	$gradPost = $_POST['vGrad'];
	$secPost = $_POST['vSec'];

	$fnSec = new Record();

	echo $fnSec->vAsignacionGS($secPost, $gradPost);
}

 ?>
