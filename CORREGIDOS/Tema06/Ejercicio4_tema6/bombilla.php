<?php 
require_once "encendible.php";

	class bombilla implements encendible{
		private $horasDeVida;
		private $estado;

		function __construct($horasDeVida){
			
				$this->horasDeVida=$horasDeVida;
				$this->estado="apagado";
						
		}

		 function encender(){
			if($this->horasDeVida > 2){
				$this->estado = "encendido";
				echo "Has encendido la bombilla";
			}else{
				echo "La bombilla no le quedan horas de vida!!!";
			}
		}

		 function apagar(){
			if($this->estado = "encendido"){
				$this->estado = "apagado";
				echo "Has apagado la bombilla";
			}else{
				echo "error la bombilla ya estaba apagado ";
			}
		}
	}

 ?>