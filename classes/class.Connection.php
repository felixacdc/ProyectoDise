<?php
	
class conexionbd extends mysqli{

	public function __construct(){
		parent::__construct('localhost','root','','edusoft');
		$this->query("SET NAMES 'utf8';"); //verifica el lenguaje que se envia a la bd o se resive
		$this->connect_errno ? die('Error en la conexion') : $x = 'Conectado';
		// echo $x;
		unset($x); //elimina la variable de la memoria		
	}	
}


?>