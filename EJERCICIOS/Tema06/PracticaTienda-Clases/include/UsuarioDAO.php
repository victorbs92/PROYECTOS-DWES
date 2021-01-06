<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("InterfaceUsuarioDAO.php");
require_once("UsuarioVO.php");

/**
 * Description of UsuarioDAO
 *
 * @author victor
 */
class UsuarioDAO implements InterfaceUsuarioDAO {

    public function insertarUsuario($usuario) {

        //incluimos el acceso a la BD
        include './db_acceso.php';

        //guardamos en variables todas las propiedades del objeto para usarlas en la consulta
        $id = $usuario->getIdUsuario();
        $nick = $usuario->getNick();
        $pass = $usuario->getPass(); //la pass la esta encriptada

        $sqlInsertarUsuario = "INSERT INTO usuarios VALUES ('$id','$nick','$pass')"; //consulta para insertar un nuevo usuario en la BD

        if (!$conexion->query($sqlInsertarUsuario)) {//si la consulta devuelve false
            $errorCode = mysqli_errno($conexion); //guardamos en una variable el codigo del error

            $conexion->rollback(); //hacemos rollbacak
            $conexion->close(); //cerramos la conexion

            return $errorCode; //Devolvemos el código de error para comprobarlo desde donde se ha llamado a este método
        } else {//si la consulta salió bien
            $conexion->commit(); //hacemos commit
            $conexion->close(); //cerramos la conexion
            return true;
        }
    }

    public function obtenerUsuario($usuario) {

        //incluimos el acceso a la BD
        include './db_acceso.php';

        $nick = $usuario->getNick(); //guardamos el nombre del usuario

        $sqlComprobarUsuario = "SELECT pass FROM usuarios WHERE nick = '$nick'"; //consulta para comprobar que el usuario existe en la BD

        $resultado = $conexion->query($sqlComprobarUsuario); //ejecutamos la consulta y guardamos el resultado que devuelve (el nº de filas afectadas)

        $conexion->close(); //cerramos la conexion

        return $resultado;
    }

    public function passwordRehash($usuario) {

        //incluimos el acceso a la BD
        include './db_acceso.php';

        $nick = $usuario->getNick();
        $pass = $usuario->getPass();

        $sqlPasswordRehash = "UPDATE usuarios SET pass = '$pass' WHERE nick = '$nick'"; //consulta para cambiar el hash de la bd por el nuevo generado con la misma contraseña

        if (!$conexion->query($sqlPasswordRehash)) {//si la consulta devuelve false
            $errorCode = mysqli_errno($conexion); //guardamos en una variable el codigo del error

            $conexion->rollback(); //hacemos rollbacak
            $conexion->close(); //cerramos la conexion

            return $errorCode; //Devolvemos el código de error para comprobarlo desde donde se ha llamado a este método
        } else {//si la consulta salió bien
            $conexion->commit(); //hacemos commit
            $conexion->close(); //cerramos la conexion

            return true;
        }
    }

}
