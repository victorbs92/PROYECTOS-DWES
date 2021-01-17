<?php 

class Cuenta {
	protected $numero;
	protected $titular;
	protected $saldo;
	
	public function __construct($numero, $titular, $saldo){
		$this->numero=$numero;
		$this->titular=$titular;
		$this->saldo=$saldo;
	}

	public function getNumero(){
		return $this->numero;
	}

	public function getTitular(){
		return $this->titular;
	}

	public function getSaldo(){
		return $this->saldo;
	}

	public function setSaldo($saldo){
		$this->saldo=$saldo;
	}

	public function setTitular($titular){
		$this->titular=$titular;
	}

	public function setNumero($numero){
		$this->numero=$numero;
	}

	public function ingreso($cantidad){
		$this->saldo=$this->saldo+$cantidad;
	}

	public function reintegro($cantidad){
		if($cantidad>$this->saldo){
			return false;
		}else{
			$this->saldo=$this->saldo-$cantidad;
			return true;
		}
	}

	public function esPreferencial($cantidad){
		if($cantidad>$this->saldo){
			return false;
		}else{
			return true;
		}
	}
	public function mostrar(){
		echo "<div class='text-center'><h1>Titular:".$this->titular."</h1><br><h2>Saldo= ".$this->saldo."</h2><br><h2>Numero de la cuenta: ".$this->numero."</h2><br><div>";
	}
}
 ?>
