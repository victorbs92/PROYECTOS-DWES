<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticuloVO
 * Articulo Value Object
 * @author admin
 */
class ArticuloVO {

    private $idArticulo;
    private $fechaArticulo;
    private $tituloArticulo;
    private $descripcionArticulo;

    function __construct($idArticulo, $fechaArticulo, $tituloArticulo, $descripcionArticulo) {
        $this->idArticulo = $idArticulo;
        $this->fechaArticulo = $fechaArticulo;
        $this->tituloArticulo = $tituloArticulo;
        $this->descripcionArticulo = $descripcionArticulo;
    }

    function getIdArticulo() {
        return $this->idArticulo;
    }

    function getFechaArticulo() {
        return $this->fechaArticulo;
    }

    function getTituloArticulo() {
        return $this->tituloArticulo;
    }

    function getDescripcionArticulo() {
        return $this->descripcionArticulo;
    }

    function setIdArticulo($idArticulo): void {
        $this->idArticulo = $idArticulo;
    }

    function setFechaArticulo($fechaArticulo): void {
        $this->fechaArticulo = $fechaArticulo;
    }

    function setTituloArticulo($tituloArticulo): void {
        $this->tituloArticulo = $tituloArticulo;
    }

    function setDescripcionArticulo($descripcionArticulo): void {
        $this->descripcionArticulo = $descripcionArticulo;
    }

    public function getAllPropierties($objectClass) {
        return get_object_vars($objectClass);
    }

}
