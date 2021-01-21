<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session
 *
 * @author victor
 */
class Session {

    public static function crearSesion($nombre) {
        session_name($nombre);
        session_start();
    }

    public static function eliminarSesion() {
        $_SESSION = array();
        setcookie(session_name(), '', time() - 42000, '/');
        session_destroy();
        session_unset();
    }

}
