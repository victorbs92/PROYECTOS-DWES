<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PerfilDAO
 *
 * @author victor
 */
class PerfilDAO implements InterfacePerfilDAO {

    public function insertarPerfil($perfil) {
        /* Accedemos a la BD */
        $conexionBD = ConexionBD::getInstance();
        $conexionMYSQLI = $conexionBD->connectMYSQLI();

        //guardamos en variables todas las propiedades del objeto para usarlas en la consulta
        $idPerfil = $perfil->getIdPerfil();
        $idUsuario = $perfil->getIdUsuario()['idUsuario'];
        $getNombreUsuario = $perfil->getNombreUsuario();
        $getEdadUsuario = $perfil->getEdadUsuario();
        $getDescripcionUsuario = $perfil->getDescripcionUsuario();

        $sqlInsertarPerfil = "INSERT INTO perfil VALUES ('$idPerfil','$idUsuario','$getNombreUsuario','$getEdadUsuario','$getDescripcionUsuario')"; //consulta para insertar un nuevo usuario en la BD

        if (!$conexionMYSQLI->query($sqlInsertarPerfil)) {//si la consulta devuelve false
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

    public function obtenerPerfilPorIdUsuario($idUsuario) {
        /* Accedemos a la BD */
        $conexionBD = ConexionBD::getInstance();
        $conexionMYSQLI = $conexionBD->connectMYSQLI();

        $obtenerPerfilPorIdUsuario = "SELECT * FROM perfil WHERE idUsuario = '$idUsuario'"; //consulta para comprobar que el usuario existe en la BD

        $resultado = $conexionMYSQLI->query($obtenerPerfilPorIdUsuario); //ejecutamos la consulta y guardamos el resultado que devuelve (el nº de filas afectadas)

        $conexionMYSQLI->close(); //cerramos la conexion

        return $resultado;
    }

    public function actualizarPerfil($perfil) {
        /* Accedemos a la BD */
        $conexionBD = ConexionBD::getInstance();
        $conexionMYSQLI = $conexionBD->connectMYSQLI();
        
        //guardamos los datos del perfil en variables para pasarselos a la consulta
        $idUsuario = $perfil->getIdUsuario();
        $nombreUsuario = $perfil->getNombreUsuario();
        $edadUsuario = $perfil->getEdadUsuario();
        $descripcionUsuario = $perfil->getDescripcionUsuario();
        
        $sqlActualizarPerfil = "UPDATE perfil SET nombreUsuario = '$nombreUsuario', edadUsuario = '$edadUsuario', descripcionUsuario = '$descripcionUsuario' WHERE idUsuario = '$idUsuario'"; //consulta para cambiar el hash de la bd por el nuevo generado con la misma contraseña
        if (!$conexionMYSQLI->query($sqlActualizarPerfil)) {//si la consulta devuelve false
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
