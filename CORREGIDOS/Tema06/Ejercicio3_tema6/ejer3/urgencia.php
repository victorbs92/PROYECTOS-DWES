<?php 
	require_once "medico.php";

	class urgencia extends medico{
		protected $unidad;

		public function __construct($nombre,$edad,$turno,$unidad){		
			parent::__construct($nombre,$edad,$turno);
			$this->unidad=$unidad;
		}

		public function getUnidad(){
			return $this->unidad;
		}

		public function setUnidad($unidad){
			$this->unidad=$unidad;
		}

		public function mostrar(){
			parent::mostrar();
			echo "<h4>Numero de medicos: ".$this->unidad."</h4>";
		}
	}
 ?>