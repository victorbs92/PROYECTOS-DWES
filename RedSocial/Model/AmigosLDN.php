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
        $flag = false;
        $usuarioDAO = new UsuarioDAO(); //creamos un objeto de la clase UsuarioDAO
        $amigosDAO = new AmigosDAO();  //creamos un objeto de la clase AmigosDAO
        //buscamos el idUsuario del usuarioActial en la bd por su nick
        $obtenerIdUsuarioActualPorNick = $usuarioDAO->obtenerIdUsuarioPorNick($nickUsuarioActual); //obtiene el id del usuarioActual
        $idUsuarioActual = $obtenerIdUsuarioActualPorNick->fetch_array(); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null
        //buscamos el idUsuario del usuarioElegido en la bd por su nick
        $obtenerIdUsuarioElegidoPorNick = $usuarioDAO->obtenerIdUsuarioPorNick($nickUsuarioElegido); //obtiene el id del usuarioElegido
        $idUsuarioElegido = $obtenerIdUsuarioElegidoPorNick->fetch_array(); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null

        $resultado = $amigosDAO->obtenerAmigos($idUsuarioActual); //guarda en una variabla el resultado de ejecutar la consulta a la bd para obtener los amigos
        $rows = $resultado->fetch_all(MYSQLI_ASSOC); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null

        for ($i = 0; $i < count($rows); $i++) { //Recorremos el array rows

            if ($rows[$i]['idUsuarioB'] == $idUsuarioElegido['idUsuario']) {//si el nickUsuarioElegido se encuentra entre los resultados, paramos el bucle y devolvemos true
                return true;
            }
        }
       return false;
    }

}
