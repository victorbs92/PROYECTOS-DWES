<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

/**
 * Description of UsuarioDAO
 * Usuario Data Acces Object
 * @author admin
 */
class UsuarioDAO implements InterfaceUsuarioDAO {

    public function insertarUsuario($usuario) {

        /* Accedemos a la BD */
        $conexionBD = ConexionBD::getInstance();
        $conexionMYSQLI = $conexionBD->connectMYSQLI();

        //guardamos en variables todas las propiedades del objeto para usarlas en la consulta
        $id = $usuario->getIdUsuario();
        $nick = $usuario->getNickUsuario();
        $pass = $usuario->getPasswordUsuario(); //la pass la esta encriptada

        $sqlInsertarUsuario = "INSERT INTO usuario VALUES ('$id','$nick','$pass')"; //consulta para insertar un nuevo usuario en la BD

        if (!$conexionMYSQLI->query($sqlInsertarUsuario)) {//si la consulta devuelve false
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

    public function obtenerUsuario($usuario) {

        /* Accedemos a la BD */
        $conexionBD = ConexionBD::getInstance();
        $conexionMYSQLI = $conexionBD->connectMYSQLI();

        $nick = $usuario->getNickUsuario(); //guardamos el nombre del usuario

        $sqlComprobarUsuario = "SELECT passwordUsuario FROM usuario WHERE nickUsuario = '$nick'"; //consulta para comprobar que el usuario existe en la BD

        $resultado = $conexionMYSQLI->query($sqlComprobarUsuario); //ejecutamos la consulta y guardamos el resultado que devuelve (el nº de filas afectadas)

        $conexionMYSQLI->close(); //cerramos la conexion

        return $resultado;
    }

    public function passwordRehash($usuario) {

        /* Accedemos a la BD */
        $conexionBD = ConexionBD::getInstance();
        $conexionMYSQLI = $conexionBD->connectMYSQLI();

        $nick = $usuario->getNickUsuario();
        $pass = $usuario->getPasswordUsuario();

        $sqlPasswordRehash = "UPDATE usuario SET passwordUsuario = '$pass' WHERE nickUsuario = '$nick'"; //consulta para cambiar el hash de la bd por el nuevo generado con la misma contraseña

        if (!$conexionMYSQLI->query($sqlPasswordRehash)) {//si la consulta devuelve false
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

}
