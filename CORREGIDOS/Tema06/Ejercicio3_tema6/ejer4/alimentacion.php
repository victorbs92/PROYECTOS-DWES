<?php 
	require_once "producto.php";

	class alimentacion extends producto{
		protected $mes;
		protected $anio;

		public function __construct($codigo, $precio, $nombre,$mes, $anio){
			parent::__construct($codigo, $precio, $nombre);
			$this->mes=$mes;
			$this->anio=$anio;
		}

		public function getAnio(){
			return $this->anio;
		}
		public function getMes(){
			return $this->mes;
		}

		public function setMes($mes){
			$this->mes=$mes;
		}
		public function setAnio($anio){
			$this->anio=$anio;
		}

		public function mostrar(){
			parent::mostrar();
			echo "<h5>Caducidad: Mes= ".$this->mes." año= ".$this->anio."</h5>";
		}
	}

 ?>