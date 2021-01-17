<?php 
	class producto {
		protected $codigo;
		protected $precio;
		protected $nombre;

		public function __construct($codigo, $precio, $nombre){
			$this->codigo=$codigo;
			$this->precio=$precio;
			$this->nombre=$nombre;
		}

		public function getCodigo(){
			return $this->codigo;
		}
		public function getPrecio(){
			return $this->precio;
		}
		public function getNombre(){
			return $this->nombre;
		}

		public function setCodigo($codigo){
			$this->codigo=$codigo;
		}
		public function setPrecio($precio){
			$this->precio=$precio;
		}
		public function setNombre($nombre){
			$this->nombre=$nombre;
		}

		public function mostrar(){
			echo "<h4>=>Nombre:".$this->nombre."</h4><h5>Codigo= ".$this->codigo."</h5><h5>Precio: ".$this->precio."</h5>";
		}
	}

 ?>