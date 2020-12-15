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
        $pass = $usuario->getPass();

        $sqlInsertarUsuario = "INSERT INTO usuarios VALUES ('$id','$nick','$pass')"; //consulta para insertar un nuevo usuario en la BD

        if (!$conexion->query($sqlInsertarUsuario)) {//si la consulta devuelve false
            $errorCode = mysqli_errno($conexion); //guardamos en una variable el codigo del error

            if ($errorCode == 1062) { //1062 = codigo de error para intentar insertar un dato duplicado en la tabla en el campo usuario porque esta como UNIQUE
                return 1;
            } else {
                $conexion->rollback(); //hacemos rollbacak
                $conexion->close(); //cerramos la conexion
                return 2;
            }
        } else {//si la consulta salió bien
            $conexion->commit(); //hacemos commit
            $conexion->close(); //cerramos la conexion
            return 3;
        }
    }

}
