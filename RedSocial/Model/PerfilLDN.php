<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

/**
 * Description of PerfilLDN
 *
 * @author victor
 */
class PerfilLDN {

    function obtenerPerfil($nick) { //metodo para obtener el perfil del usuario en la bd
        $usuarioDAO = new UsuarioDAO(); //creamos un objeto de la clase UsuarioDAO
        $perfilDAO = new PerfilDAO(); //creamos un objeto de la clase PerfilDAO
        
        //buscamos el idUsuario en la bd por su nick
        $obtenerIdUsuarioPorNick = $usuarioDAO->obtenerIdUsuarioPorNick($nick); //pasamos a la funcion obtenerUsuarioPorNick el usuario creado con los datos obtenidos de la sesion para saber si existe en la BD y guardamos el resultado en la variable $resultado
        $idUsuario = $obtenerIdUsuarioPorNick->fetch_array(MYSQLI_ASSOC); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null
        
        //obtenemos el perfil de ese usuario y lo guardamos en un objeto PerfilVO y devolvemos ese objeto
        $obtenerPerfilPorIdUsuario = $perfilDAO->obtenerPerfilPorIdUsuario($idUsuario['idUsuario']); //pasamos el idUsuario a la funcion obtenerPerfil de la clase PerfilDAO para obtener el perfil del usuario y lo guardamos en una variable
        $perfilUsuario = $obtenerPerfilPorIdUsuario->fetch_array(MYSQLI_ASSOC); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null
        
        if ($perfilUsuario == null) { //si al obtener el perfil nos da null es porque el perfil del usuario todavia no esta creado en la bd, asi que creamos un objeto PerfilVO utilizando el id del usuario y el resto de campos en blanco y lo guardamos en la bd y devolvemos ese objeto 
            $perfil = new PerfilVO('NULL', $idUsuario, '', 0, ''); //creamos el perfil del usuario con todos los parametros en blanco
            $insertarPerfil = $perfilDAO->insertarPerfil($perfil);
            return $perfil;
        } else {//si el array es distinto de null
            //creamos el perfil con los datos obtenidos de la bd y lo devolvemos para que la vista lo pinte
            $perfil = new PerfilVO($perfilUsuario['idPerfil'], $perfilUsuario['idUsuario'], $perfilUsuario['nombreUsuario'], $perfilUsuario['edadUsuario'], $perfilUsuario['descripcionUsuario'] );
            return $perfil;
            
        }
    }
    
    function actualizarPerfil($nick, $perfil) {
        $usuarioDAO = new UsuarioDAO(); //creamos un objeto de la clase UsuarioDAO
        $perfilDAO = new PerfilDAO(); //creamos un objeto de la clase PerfilDAO
        
        //buscamos el idUsuario en la bd por su nick
        $obtenerIdUsuarioPorNick = $usuarioDAO->obtenerIdUsuarioPorNick($nick); //pasamos a la funcion obtenerUsuarioPorNick el usuario creado con los datos obtenidos de la sesion para saber si existe en la BD y guardamos el resultado en la variable $resultado
        $idUsuario = $obtenerIdUsuarioPorNick->fetch_array(MYSQLI_ASSOC); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null
        
        $perfil->setIdUsuario($idUsuario['idUsuario']);//actualizamos el campo idUsuario del perfil para poder usarlo en el WHERE de la consulta Update 
        
        //pasamos el idUsuario a la funcion obtenerPerfil de la clase PerfilDAO para obtener el perfil del usuario y lo guardamos en una variable
        $sqlActualizarPerfil = $perfilDAO->actualizarPerfil($perfil);
        
    }
    
    

}
