<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoVO
 *
 * @author victor
 */
class ProductoVO {

    private $idProducto;
    private $nombreProducto;
    private $stock;
    private $precio;
    private $imagen;

    function __construct($idProducto, $nombreProducto, $stock, $precio, $imagen) {
        $this->idProducto = $idProducto;
        $this->nombreProducto = $nombreProducto;
        $this->stock = $stock;
        $this->precio = $precio;
        $this->imagen = $imagen;
    }

    public function __get($propiedad) {
        if (property_exists($this, $propiedad)) {
            return $this->$propiedad;
        }
    }

    function getIdProducto() {
        return $this->idProducto;
    }

    function getNombreProducto() {
        return $this->nombreProducto;
    }

    function getStock() {
        return $this->stock;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setIdProducto($idProducto): void {
        $this->idProducto = $idProducto;
    }

    function setNombreProducto($nombreProducto): void {
        $this->nombreProducto = $nombreProducto;
    }

    function setStock($stock): void {
        $this->stock = $stock;
    }

    function setPrecio($precio): void {
        $this->precio = $precio;
    }

    function setImagen($imagen): void {
        $this->imagen = $imagen;
    }

}
