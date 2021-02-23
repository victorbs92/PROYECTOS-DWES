<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostVO
 *
 * @author victor
 */
class PostVO {

    private $idPost;
    private $idUsuario;
    private $mensaje;
    private $fechaPost;

    function __construct($idPost, $idUsuario, $mensaje, $fechaPost) {
        $this->idPost = $idPost;
        $this->idUsuario = $idUsuario;
        $this->mensaje = $mensaje;
        $this->fechaPost = $fechaPost;
    }

    function getIdPost() {
        return $this->idPost;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function getFechaPost() {
        return $this->fechaPost;
    }

    function setIdPost($idPost): void {
        $this->idPost = $idPost;
    }

    function setIdUsuario($idUsuario): void {
        $this->idUsuario = $idUsuario;
    }

    function setMensaje($mensaje): void {
        $this->mensaje = $mensaje;
    }

    function setFechaPost($fechaPost): void {
        $this->fechaPost = $fechaPost;
    }

    public function getAllPropierties($objectClass) {
        return get_object_vars($objectClass);
    }

}
