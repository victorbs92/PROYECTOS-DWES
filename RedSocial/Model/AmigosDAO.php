<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AmigosDAO
 *
 * @author victor
 */
class AmigosDAO {

    public function añadirAmigo($idUsuarioActual, $idUsuarioElegido) {

        /* Accedemos a la BD */
        $conexionBD = ConexionBD::getInstance();
        $conexionMYSQLI = $conexionBD->connectMYSQLI();

        //guardamos los datos en variables para pasarselos a la consulta
        $idUsuarioActualString = $idUsuarioActual['idUsuario'];
        $idUsuarioElegidoString = $idUsuarioElegido['idUsuario'];

        $sqlAñadirAmigo = "INSERT INTO amigos VALUES ('$idUsuarioActualString','$idUsuarioElegidoString')"; //consulta para insertar un nuevo usuario en la BD

        if (!$conexionMYSQLI->query($sqlAñadirAmigo)) {//si la consulta devuelve false
            $errorCode = mysqli_errno($conexionMYSQLI); //guardamos en una variable el codigo del error

            $conexionMYSQLI->rollback(); //hacemos rollbacak
            $conexionMYSQLI->close(); //cerramos la conexion

            return $errorCode; //Devolvemos el código de error para comprobarlo desde donde se ha llamado a este método
        } else {//si la consulta salió bien
            $conexionMYSQLI->commit(); //hacemos commit
            $conexionMYSQLI->close(); //cerramos la conexion
            return true;
        }
    }

    public function obtenerAmigos($idUsuarioActual) {

        /* Accedemos a la BD */
        $conexionBD = ConexionBD::getInstance();
        $conexionMYSQLI = $conexionBD->connectMYSQLI();

        //guardamos los datos en variables para pasarselos a la consulta
        $idUsuarioActualString = $idUsuarioActual['idUsuario'];

        $obtenerAmigos = "SELECT idUsuarioB FROM amigos WHERE idUsuarioA = '$idUsuarioActualString'"; //consulta para comprobar que el usuario existe en la BD

        $resultado = $conexionMYSQLI->query($obtenerAmigos); //ejecutamos la consulta y guardamos el resultado que devuelve (el nº de filas afectadas)

        $conexionMYSQLI->close(); //cerramos la conexion

        return $resultado;
    }

}
