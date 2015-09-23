<?php

class ConnectionClass extends mysqli{

	private $servidor = 'localhost';
	private $db = 'edusoft';
	private $user = 'root';
	private $password = '';

	public function __construct(){
		parent::__construct($this->servidor, $this->user, $this->password, $this->db);
		$this->query("SET NAMES 'utf8';");
		$this->connect_errno ? die('Error en la conexion') : $x = 'Conectado';
		unset($x);
	}
}


?>
