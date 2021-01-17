<?php 

	abstract class medico{
		protected $nombre;
		protected $edad;
		protected $turno;

		public function __construct($nombre,$edad,$turno){
			$this->nombre=$nombre;
			$this->edad=$edad;
			$this->turno=$turno;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function getEdad(){
			return $this->edad;
		}

		public function getTurno(){
			return $this->turno;
		}

		public function setNombre($nombre){
			$this->nombre=$nombre;
		}

		public function setTurno($turno){
			$this->turno=$turno;
		}

		public function setEdad($edad){
			$this->edad=$edad;
		}

		public function mostrar(){
			echo "<h4>=>Nombre:".$this->nombre."</h4><h5>Edad= ".$this->edad."</h5><h5>Turno: ".$this->turno."</h5>";
		} 
	}

 ?>