<?php

class Producto {

    private $codigo;
    private $precio;
    private $nombre;

    function __construct($codigo, $precio, $nombre) {
        $this->codigo = $codigo;
        $this->precio = $precio;
        $this->nombre = $nombre;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setCodigo($codigo): void {
        $this->codigo = $codigo;
    }

    function setPrecio($precio): void {
        $this->precio = $precio;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    function mostrar() {
        print "Codigo: " . $this->codigo;
        print "<br>";
        print "Precio: " . $this->precio;
        print "<br>";
        print "Nombre: " . $this->nombre;
        print "<br>";
    }

}

class Alimentacion extends Producto {

    private $mesCaducidad;
    private $anioCaducidad;

    function __construct($codigo, $precio, $nombre, $mesCaducidad, $anioCaducidad) {
        parent::__construct($codigo, $precio, $nombre);
        $this->mesCaducidad = $mesCaducidad;
        $this->anioCaducidad = $anioCaducidad;
    }

    function getMesCaducidad() {
        return $this->mesCaducidad;
    }

    function getAnoCaducidad() {
        return $this->anioCaducidad;
    }

    function setMesCaducidad($mesCaducidad): void {
        $this->mesCaducidad = $mesCaducidad;
    }

    function setAnoCaducidad($anioCaducidad): void {
        $this->anioCaducidad = $anioCaducidad;
    }

    function mostrar() {
        print "Codigo: " . $this->codigo;
        print "<br>";
        print "Precio: " . $this->precio;
        print "<br>";
        print "Nombre: " . $this->nombre;
        print "<br>";
        print "Mes caducidad: " . $this->mesCaducidad;
        print "<br>";
        print "Año caducidad: " . $this->anioCaducidad;
        print "<br>";
    }

}

class Electronica extends Producto {

    private $garantia;

    function __construct($codigo, $precio, $nombre, $garantia) {
        parent::__construct($codigo, $precio, $nombre);
        $this->garantia = $garantia;
    }

    function getGarantia() {
        return $this->garantia;
    }

    function setGarantia($garantia): void {
        $this->garantia = $garantia;
    }

    function mostrar() {
        print "Codigo: " . $this->codigo;
        print "<br>";
        print "Precio: " . $this->precio;
        print "<br>";
        print "Nombre: " . $this->nombre;
        print "<br>";
        print "Garantia: " . $this->garantia;
        print "<br>";
    }

}
