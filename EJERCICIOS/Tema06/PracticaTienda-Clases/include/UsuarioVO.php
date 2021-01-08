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

    public const HASH = PASSWORD_DEFAULT;
    public const COST = 15;

    private $idUsuario;
    private $nick;
    private $pass;

    function __construct($idUsuario, $nick, $pass) {
        $this->idUsuario = $idUsuario;
        $this->nick = $nick;
        $this->pass = password_hash($pass, self::HASH, ['cost' => self::COST]); //la pass se "hashea" al crear el usuario
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNick() {
        return $this->nick;
    }

    function getPass() { //al obtener la pass, se obtiene cifrada
        return $this->pass;
    }

    function setIdUsuario($idUsuario): void {
        $this->idUsuario = $idUsuario;
    }

    function setNick($nick): void {
        $this->nick = $nick;
    }

    function setPass($pass): void { //al modificar la pass se vuelve a encriptar
        $this->pass = password_hash($pass, self::HASH, ['cost' => self::COST]);
    }

    public function getAllPropierties($objectClass) {
        return get_object_vars($objectClass);
    }

}
