<?php 
/**
* 
*/
class empleado{
	protected $nombre;
	protected $sueldo;

	public function __construct($nombre, $sueldo){
		$this->nombre=$nombre;
		$this->sueldo=$sueldo;
	}
	public function getSueldo(){
		return $this->sueldo;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function setSueldo($sueldo){
		$this->sueldo=$sueldo;
	}
	public function setNombre($nombre){
		$this->nombre=$nombre;
	}
}

 ?>