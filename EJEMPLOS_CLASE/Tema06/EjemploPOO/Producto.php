<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author admin
 */
class Producto {

    private $codigo;
    private $nombre;
    private $precio;

    private function mostrar() {
        print "<p>" . $this->$codigo . "</p>";
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setCodigo($codigo): void {
        $this->codigo = $codigo;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    function setPrecio($precio): void {
        $this->precio = $precio;
    }

}
