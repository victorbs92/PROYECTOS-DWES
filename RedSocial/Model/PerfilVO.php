<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PerfilVO
 *
 * @author victo
 */
class PerfilVO {

    private $idPerfil;
    private $idUsuario;
    private $nombreUsuario;
    private $edadUsuario;
    private $descripcionUsuario;

    function __construct($idPerfil, $idUsuario, $nombreUsuario, $edadUsuario, $descripcionUsuario) {
        $this->idPerfil = $idPerfil;
        $this->idUsuario = $idUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->edadUsuario = $edadUsuario;
        $this->descripcionUsuario = $descripcionUsuario;
    }

    function getIdPerfil() {
        return $this->idPerfil;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    function getEdadUsuario() {
        return $this->edadUsuario;
    }

    function getDescripcionUsuario() {
        return $this->descripcionUsuario;
    }

    function setIdPerfil($idPerfil): void {
        $this->idPerfil = $idPerfil;
    }

    function setIdUsuario($idUsuario): void {
        $this->idUsuario = $idUsuario;
    }

    function setNombreUsuario($nombreUsuario): void {
        $this->nombreUsuario = $nombreUsuario;
    }

    function setEdadUsuario($edadUsuario): void {
        $this->edadUsuario = $edadUsuario;
    }

    function setDescripcionUsuario($descripcionUsuario): void {
        $this->descripcionUsuario = $descripcionUsuario;
    }

    public function getAllPropierties($objectClass) {
        return get_object_vars($objectClass);
    }

}
