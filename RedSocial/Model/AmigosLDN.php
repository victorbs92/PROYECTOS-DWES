<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AmigosLDN
 *
 * @author victor
 */
class AmigosLDN {

    public function añadirAmigo($nickUsuarioActual, $nickUsuarioElegido) {
        $usuarioDAO = new UsuarioDAO(); //creamos un objeto de la clase UsuarioDAO
        $amigosDAO = new AmigosDAO();  //creamos un objeto de la clase AmigosDAO
        //buscamos el idUsuario del usuarioActial en la bd por su nick
        $obtenerIdUsuarioActualPorNick = $usuarioDAO->obtenerIdUsuarioPorNick($nickUsuarioActual); //obtiene el id del usuarioActual
        $idUsuarioActual = $obtenerIdUsuarioActualPorNick->fetch_array(); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null
        //buscamos el idUsuario del usuarioElegido en la bd por su nick
        $obtenerIdUsuarioElegidoPorNick = $usuarioDAO->obtenerIdUsuarioPorNick($nickUsuarioElegido); //obtiene el id del usuarioElegido
        $idUsuarioElegido = $obtenerIdUsuarioElegidoPorNick->fetch_array(); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null

        $resultado = $amigosDAO->añadirAmigo($idUsuarioActual, $idUsuarioElegido); //guarda en una variabla el resultado de ejecutar la consulta a la bd para agregar un amigo

        if ($resultado == true) { //si la consulta salio bien devolvemos true
            return true;
        } else {//si la consulta salio mal, devolvemos false
            return false;
        }
    }

    public function comprobarSiEsAmigo($nickUsuarioActual, $nickUsuarioElegido) {
        $usuarioDAO = new UsuarioDAO(); //creamos un objeto de la clase UsuarioDAO
        $amigosDAO = new AmigosDAO();  //creamos un objeto de la clase AmigosDAO
        //buscamos el idUsuario del usuarioActial en la bd por su nick
        $obtenerIdUsuarioActualPorNick = $usuarioDAO->obtenerIdUsuarioPorNick($nickUsuarioActual); //obtiene el id del usuarioActual
        $idUsuarioActual = $obtenerIdUsuarioActualPorNick->fetch_array(); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null
        //buscamos el idUsuario del usuarioElegido en la bd por su nick
        $obtenerIdUsuarioElegidoPorNick = $usuarioDAO->obtenerIdUsuarioPorNick($nickUsuarioElegido); //obtiene el id del usuarioElegido
        $idUsuarioElegido = $obtenerIdUsuarioElegidoPorNick->fetch_array(); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null

        $resultado = $amigosDAO->comprobarSiEsAmigo($idUsuarioActual, $idUsuarioElegido); //guarda en una variabla el resultado de ejecutar la consulta a la bd para saber los amigos
        $rows = $resultado->fetch_array(); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null

        if ($rows == null) {
            return false;
        } else {
            return true;
        }
    }

    public function eliminarAmigo($nickUsuarioActual, $nickUsuarioElegido) {
        $usuarioDAO = new UsuarioDAO(); //creamos un objeto de la clase UsuarioDAO
        $amigosDAO = new AmigosDAO();  //creamos un objeto de la clase AmigosDAO
        //buscamos el idUsuario del usuarioActial en la bd por su nick
        $obtenerIdUsuarioActualPorNick = $usuarioDAO->obtenerIdUsuarioPorNick($nickUsuarioActual); //obtiene el id del usuarioActual
        $idUsuarioActual = $obtenerIdUsuarioActualPorNick->fetch_array(); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null
        //buscamos el idUsuario del usuarioElegido en la bd por su nick
        $obtenerIdUsuarioElegidoPorNick = $usuarioDAO->obtenerIdUsuarioPorNick($nickUsuarioElegido); //obtiene el id del usuarioElegido
        $idUsuarioElegido = $obtenerIdUsuarioElegidoPorNick->fetch_array(); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null

        $resultado = $amigosDAO->eliminarAmigo($idUsuarioActual, $idUsuarioElegido); //guarda en una variabla el resultado de ejecutar la consulta a la bd para obtener los amigos

        if ($resultado == true) { //si la consulta salio bien devolvemos true
            return true;
        } else {//si la consulta salio mal, devolvemos false
            return false;
        }
    }

    public function obtenerNickAmigos($nickUsuarioActual) {
        $arrayNicksAmigos = array();
        $usuarioDAO = new UsuarioDAO(); //creamos un objeto de la clase UsuarioDAO
        $amigosDAO = new AmigosDAO();  //creamos un objeto de la clase AmigosDAO
        //buscamos el idUsuario del usuarioActial en la bd por su nick
        $obtenerIdUsuarioActualPorNick = $usuarioDAO->obtenerIdUsuarioPorNick($nickUsuarioActual); //obtiene el id del usuarioActual
        $idUsuarioActual = $obtenerIdUsuarioActualPorNick->fetch_array(); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null

        $obtenerIdAmigos = $amigosDAO->obtenerIdAmigos($idUsuarioActual); //guardamos en una variable el resultado de ejecutar la consulta que obtiene todos los amigos
        $idsAmigos = $obtenerIdAmigos->fetch_all(MYSQLI_ASSOC); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null

        if ($idsAmigos == null) { //si al recuperar los ids de tus amigos devuelve null es que no tienes amigos y retorna null
            return null;
        } else {//si obtenemos ids, es que si que tienes amigos, asi que obtenemos sus nicks a partir de sus ids
            
            for ($i = 0; $i < count($idsAmigos); $i++) { //Recorremos el array resultado, obteniendo el nick de cada amigo por su id y lo añadimos al array arrayNickAmigos
                $obtenerNickAmigoPorSuId = $amigosDAO->obtenerNickAmigoPorSuId($idsAmigos[$i]['idUsuarioB']); //obtiene el nick del usuario

                $nickAmigo = $obtenerNickAmigoPorSuId->fetch_array(MYSQLI_ASSOC); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null
                array_push($arrayNicksAmigos, $nickAmigo); //añadir el nick al arrayNickAmigos
            }
            return $arrayNicksAmigos;
        }
    }

}
