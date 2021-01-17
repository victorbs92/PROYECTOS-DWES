<?php 
require_once "encendible.php";

	class coche implements encendible{
		private $gasolina;
		private $bateria;
		private $estado;

		function __construct(){
			$this->gasolina=0;
			$this->bateria=10;
			$this->estado="apagado";
		}

		public function gasoil($litros){
			$this->gasolina+=$litros;
		} 

		public function encender(){
			if($this->gasolina > 0 &&
			    $this->bateria > 0 && 
			    $this->estado == "apagado" ){
				$this->gasolina--;
				$this->bateria--;
				$this->estado = "encendido";
				echo "Has encendido el coche";
			}else{
				echo "ERORRR NO PUEDES ENCENDER EL COCHE!!!";
			}
		}

		public function apagar(){
			if($this->estado = "encendido"){
				$this->estado = "apagado";
			}else{
				echo "error el coche ya estaba apagado ";
			}
		}
		
		public function repostar($litros){
			$this->gasolina+=$litros;
		}
	}

 ?>