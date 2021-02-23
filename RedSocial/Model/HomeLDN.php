<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeLDN
 *
 * @author victor
 */
class HomeLDN {

    public function añadirPostUsuario($nickUsuario, $mensaje) {
        $usuarioDAO = new UsuarioDAO(); //creamos un objeto de la clase UsuarioDAO
        $postDAO = new PostDAO();  //creamos un objeto de la clase PostDAO
        //buscamos el idUsuario del usuarioActial en la bd por su nick
        $obtenerIdUsuarioActualPorNick = $usuarioDAO->obtenerIdUsuarioPorNick($nickUsuario); //obtiene el id del usuarioActual
        $idUsuario = $obtenerIdUsuarioActualPorNick->fetch_array(MYSQLI_ASSOC); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null
        //creamos un objeto de la clase PostVO y se lo pasamos al metodo añadirPost de la clase postDAO
        $post = new PostVO('NULL', $idUsuario['idUsuario'], $mensaje, null);

        $añadirPostUsuario = $postDAO->añadirPost($post); //guardamos en una variable el resultado de ejecutar la consulta que agrega un post a la bd

        if ($añadirPostUsuario == true) { //si la consulta salio bien devolvemos true
            return true;
        } else {//si la consulta salio mal, devolvemos false
            return false;
        }
    }

    public function obtenerPosts($nickUsuario) {
        $arrayIds = array();
        $usuarioDAO = new UsuarioDAO(); //creamos un objeto de la clase UsuarioDAO
        $postDAO = new PostDAO();  //creamos un objeto de la clase PostDAO
        $amigosDAO = new AmigosDAO();  //creamos un objeto de la clase AmigosDAO
        //buscamos el idUsuario en la bd por su nick
        $obtenerUsuarioPorNick = $usuarioDAO->obtenerUsuarioPorNick($nickUsuario); //pasamos a la funcion obtenerUsuarioPorNick el nick del buscador para saber si existe en la BD y guardamos el resultado en la variable $resultado
        $resultadoObtenerUsuarioPorNick = $obtenerUsuarioPorNick->fetch_array(MYSQLI_ASSOC); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null
        $idUsuario = $resultadoObtenerUsuarioPorNick['idUsuario']; //guardamos en una variable el id del usuario actual
        array_push($arrayIds, $idUsuario); //agregamos al array de ids el id del usuario actual
        //obtiene los ids de sus amigos
        $obtenerIdAmigos = $amigosDAO->obtenerIdAmigos($resultadoObtenerUsuarioPorNick); //guardamos en una variable el resultado de ejecutar la consulta que obtiene todos los amigos
        $idsAmigos = $obtenerIdAmigos->fetch_all(MYSQLI_ASSOC); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null

        for ($i = 0; $i < count($idsAmigos); $i++) { //Recorremos el array idsAmigos       
            array_push($arrayIds, $idsAmigos[$i]['idUsuarioB']); //agregamos al array de ids el id del usuario[$i]
        }
        $resultado = $postDAO->obtenerPostsUsuarioYAmigos($arrayIds); //guardamos en una variable el resultado de ejecutar la consulta que obtiene todos los post del usuario y sus amigos
        $arrayPosts = $resultado->fetch_all(MYSQLI_ASSOC); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null

        return $arrayPosts;
    }

    public function obtenerIdUsuarioPorNick($nickUsuario) {
        $usuarioDAO = new UsuarioDAO(); //creamos un objeto de la clase UsuarioDAO
        //buscamos el idUsuario en la bd por su nick
        $obtenerUsuarioPorNick = $usuarioDAO->obtenerUsuarioPorNick($nickUsuario); //pasamos a la funcion obtenerUsuarioPorNick el nick del buscador para saber si existe en la BD y guardamos el resultado en la variable $resultado
        $resultadoObtenerUsuarioPorNick = $obtenerUsuarioPorNick->fetch_array(MYSQLI_ASSOC); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null
        $idUsuario = $resultadoObtenerUsuarioPorNick['idUsuario']; //guardamos en una variable el id del usuario actual
        
        return $idUsuario;
    }

}
