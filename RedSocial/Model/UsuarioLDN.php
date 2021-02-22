<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

/**
 * Description of UsuarioLDN
 * Usuario Logica De Negocio
 * @author victor
 */
class UsuarioLDN {

    function registrarUsuario($user, $pass) { //metodo para registrar usuarios en la bd
        $usuario = new UsuarioVO('NULL', $user, $pass); //creamos un objeto de la clase UsuarioVO
        $usuarioDAO = new UsuarioDAO(); //creamos un objeto de la clase UsuarioDAO

        /* llamamos al metodo de la clase para insertar un usuario y le pasamos los datos como parametros y comprobamos el return */
        if ($usuarioDAO->insertarUsuario($usuario) === true) { //si devuelve true
            return -1; //se devuelve -1 en caso de ser true para que no coincida con alguno de los codigos de error del return del else
        } else {//si no devuelve true comprobamos el código de error que ha devuelto y lo retornamos
            $error = $usuarioDAO->insertarUsuario($usuario);
            return $error;
        }
    }

    function loginUsuario($user, $pass) {

        $usuario = new UsuarioVO('NULL', $user, $pass); //creamos un objeto de la clase UsuarioVO
        $usuarioDAO = new UsuarioDAO(); //creamos un objeto de la clase UsuarioDAO

        $resultado = $usuarioDAO->obtenerUsuario($usuario); //pasamos a la funcion obtenerUsuario el usuario creado con los datos obtenidos de los campos del formulario para comprobar si existe en la BD y guardamos el resultado en la variable $resultado

        $row = $resultado->fetch_array(); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null

        if ($row == null) {//si el array es nulo significa que el usuario no existe en la bd
            return 2;
        } else {//si el array es distinto de null
            $hash = $row[0]; //guardamos en la variable $hash el resultado de la consulta, que contendrá el hash necesario para verificar la contraseña introducida en el campo Pass y así verificar si el usuario ha introducido la contraseña correcta

            if (password_verify($pass, $hash)) { //si la contraseña introducida es correcta
                if (password_needs_rehash($hash, UsuarioVO::HASH, ['cost' => UsuarioVO::HASH])) {//comprobamos si la contraseña necesita "rehasearse" porque hay un algoritmo nuevo en PASSWORD_DEFAULT
                    $usuario->setPasswordUsuario($pass); //seteamos la contraseña (que será la misma que antes) para crear un nuevo hash y guardarlo en la bd
                    $usuarioDAO->passwordRehash($usuario);
                }

                /* SESION */
                Session::crearSesion($user); //llamamos al metodo estatico de la clase Session que recibe un argumento para dar nombre a la sesion y luego la crea
                $_SESSION['nombreUsuario'] = $user; //guardamos en una variable de sesion el nombre del usuario

                return 1;
            } else {
                return 3;
            }
        }
    }

}
