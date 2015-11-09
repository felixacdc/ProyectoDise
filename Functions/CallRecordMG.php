<?php

require_once '../classes/class.FNRecordMG.php';
require_once '../classes/class.Connection.php';

if (isset($_POST['frm'])) {

	$fnRecord = new Record();

	switch ($_POST['frm']) {
		case 'frmGrado':
			$gradPost = $_POST['txtGradE'];
			echo $fnRecord->rGrad($gradPost);
			break;
		case 'frmSeccion':
			$secPost = $_POST['NameS'];
			echo $fnRecord->rSeccion($secPost);
			break;
		case 'frmAsignacionSeccion':
			$gradPost = $_POST['cboGrado'];
			$secPost = $_POST['cboseccion'];
			echo $fnRecord->rAsignacionGS($secPost, $gradPost);
			break;
		case 'Degree':
			echo $fnGrad->verityGrado($_POST['id'], $_POST['datas'][0]);
			break;
		case 'Section':
			echo $fnGrad->veritySection($_POST['id'], $_POST['datas'][0]);
			break;
		case 'AssignSection':
			echo $fnGrad->verityAssignSection($_POST['id'], $_POST['datas']);
			break;

		default:
			echo "Valor no encontrado";
			break;
	}
}elseif (isset($_POST['rGrad'])) {
	$gradPost = $_POST['rGrad'];

	$fnGrad = new Record();

	echo $fnGrad->vGrado($gradPost);
} elseif (isset($_POST['rSec'])) {
	$secPost = $_POST['rSec'];

	$fnSec = new Record();

	echo $fnSec->vSec($secPost);
} elseif (isset($_POST['vGrad']) and isset($_POST['vSec'])) {
	$gradPost = $_POST['vGrad'];
	$secPost = $_POST['vSec'];

	$fnSec = new Record();

	echo $fnSec->vAsignacionGS($secPost, $gradPost);
}

 ?>
