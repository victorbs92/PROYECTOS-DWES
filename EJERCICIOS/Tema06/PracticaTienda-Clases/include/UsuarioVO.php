<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioVO
 *
 * @author victor
 */
class UsuarioVO {

    private $idUsuario;
    private $nick;
    private $pass;

    function __construct($idUsuario, $nick, $pass) {
        $this->idUsuario = $idUsuario;
        $this->nick = $nick;
        $this->pass = $pass;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNick() {
        return $this->nick;
    }

    function getPass() {
        return $this->pass;
    }

    function setIdUsuario($idUsuario): void {
        $this->idUsuario = $idUsuario;
    }

    function setNick($nick): void {
        $this->nick = $nick;
    }

    function setPass($pass): void {
        $this->pass = $pass;
    }

}
