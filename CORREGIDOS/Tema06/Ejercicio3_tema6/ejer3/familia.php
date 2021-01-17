<?php 
	require_once "medico.php";

	class familia extends medico{
		protected $num_pacientes;

		public function __construct($nombre,$edad,$turno,$num_pacientes){	
			parent::__construct($nombre,$edad,$turno);	
			$this->num_pacientes=$num_pacientes;
		}

		public function getNum_pacientes(){
			return $this->turno;
		}

		public function setNum_pacientes($num_pacientes){
			$this->num_pacientes=$num_pacientes;
		}

		public function mostrar(){
			parent::mostrar();
			echo "<h4>Numero de pacientes= ".$this->num_pacientes."</h4>";
		}
	}
 ?>