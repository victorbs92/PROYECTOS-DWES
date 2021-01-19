<?php
require_once 'ModeloBase.php';

class Usuario extends ModeloBase{
	public $nombre;
	public $apellidos;
	public $email;
	public $password;
	
	public function __construct() {
		parent::__construct();
	}
	
	function getNombre() {
		return $this->nombre;
	}

	function getApellidos() {
		return $this->apellidos;
	}

	function getEmail() {
		return $this->email;
	}

	function getPassword() {
		return $this->password;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	function setApellidos($apellidos) {
		$this->apellidos = $apellidos;
	}

	function setEmail($email) {
		$this->email = $email;
	}

	function setPassword($password) {
		$this->password = $password;
	}

}
