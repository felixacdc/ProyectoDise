<?php

require_once '../classes/class.FNRecord.php';
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
}

 ?>
