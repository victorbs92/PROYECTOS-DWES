<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioVO
 * Usuario Value Object
 * @author victor
 */
class UsuarioVO {

    public const HASH = PASSWORD_DEFAULT;
    public const COST = 10;

    private $idUsuario;
    private $nickUsuario;
    private $passwordUsuario;

    function __construct($idUsuario, $nickUsuario, $passwordUsuario) {
        $this->idUsuario = $idUsuario;
        $this->nickUsuario = $nickUsuario;
        $this->passwordUsuario = password_hash($passwordUsuario, self::HASH, ['cost' => self::COST]); //la pass se "hashea" al crear el usuario
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNickUsuario() {
        return $this->nickUsuario;
    }

    function getPasswordUsuario() { //al obtener la pass, se obtiene cifrada
        return $this->passwordUsuario;
    }

    function setIdUsuario($idUsuario): void {
        $this->idUsuario = $idUsuario;
    }

    function setNickUsuario($nickUsuario): void {
        $this->nick = $nickUsuario;
    }

    function setPasswordUsuario($passwordUsuario): void { //al modificar la pass se vuelve a encriptar
        $this->passwordUsuario = password_hash($passwordUsuario, self::HASH, ['cost' => self::COST]);
    }

    public function getAllPropierties($objectClass) {
        return get_object_vars($objectClass);
    }

}
