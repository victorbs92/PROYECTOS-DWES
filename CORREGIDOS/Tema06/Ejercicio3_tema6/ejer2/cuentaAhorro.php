<?php 
require_once "cuenta.php";

class cuentaAhorro extends Cuenta{
	protected $comision;
	protected $interes;

	public function __construct($numero, $titular, $saldo, $comision, $interes){
		parent::__construct($numero, $titular, $saldo);
		$this->saldo=$this->saldo-$comision;
		$this->interes=$interes;
		$this->comision=$comision;
	}

	public function aplicaInteres($interes){
		$this->saldo=$this->saldo+(($interes*$this->saldo)/100);
	}

	public function mostrar(){
		parent::mostrar();
		echo "<div class='text-center'><h2>La comision de la cuenta es de :".$this->comision."</h2><h2>El interes es de: ".$this->interes."</h2></div>";
	}
}

 ?>

