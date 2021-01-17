<?php 
require_once "cuenta.php";

class cuentaCorriente extends Cuenta{
	public $cuota;

	public function __construct($numero, $titular, $saldo,$cuota){
		parent::__construct($numero, $titular, $saldo);
		$this->saldo=$this->saldo-$cuota;
		$this->cuota=$cuota;
	}

	public function reintegro($cantidad){
		if($this->saldo<=20){
			return false;
		}else{
			$this->saldo=$this->saldo-$cantidad;
			return true;
		}
	}



	public function mostrar(){
		parent::mostrar();
		echo "<div class='text-center'><h2>La cuota de mantenimiento es de :".$this->cuota."</h2></div>";
	}
}

 ?>
 

