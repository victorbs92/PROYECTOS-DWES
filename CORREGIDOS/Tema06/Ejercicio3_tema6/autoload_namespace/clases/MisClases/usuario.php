<?php
namespace MisClases;

class Usuario{
	public $nombre;
	public $email;
	
	public function __construct() {
		$this->nombre = "Cristina Valverde";
		$this->email = "cristina@cristina.com";
	}
}