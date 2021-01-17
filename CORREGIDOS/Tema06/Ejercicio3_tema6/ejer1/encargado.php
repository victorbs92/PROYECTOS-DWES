<?php
	require_once "empleado.php";

class encargado extends empleado{
	
	public function __construct($nombre, $sueldo)	{
		parent::__construct($nombre, $sueldo);
	}

	public function getSueldo(){
		return parent::getSueldo()*1.15;
	} 
}
 ?>