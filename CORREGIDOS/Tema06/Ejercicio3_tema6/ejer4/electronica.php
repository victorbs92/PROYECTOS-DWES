<?php 
	require_once "producto.php";

	class electonica extends producto{
		protected $anioC;

		public function __construct($codigo, $precio, $nombre,$anioC){
			parent::__construct($codigo, $precio, $nombre);
			$this->anioC=$anioC;
		}

		public function getAnioC(){
			return $this->anioC;
		}

		public function setAnioC($anioC){
			$this->anioC=$anioC;
		}

		public function mostrar(){
			parent::mostrar();
			echo "<h5>Plazo de garantia: ".$this->anioC."</h5>";
		}
	}

 ?>