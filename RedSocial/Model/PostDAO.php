<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostDAO
 *
 * @author victor
 */
class PostDAO implements InterfacePostDAO {

    public function añadirPost($post) {
        /* Accedemos a la BD */
        $conexionBD = ConexionBD::getInstance();
        $conexionMYSQLI = $conexionBD->connectMYSQLI();

        //guardamos en variables todas las propiedades del objeto para usarlas en la consulta
        $idPost = $post->getIdPost();
        $idUsuario = $post->getIdUsuario();
        $mensaje = $post->getMensaje();

        $sqlInsertarPost = "INSERT INTO post (idPost, idUsuario, mensaje) VALUES ('$idPost','$idUsuario','$mensaje')"; //consulta para insertar un nuevo usuario en la BD

        if (!$conexionMYSQLI->query($sqlInsertarPost)) {//si la consulta devuelve false
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

    public function obtenerPostsUsuarioYAmigos($arrayIds) {
        $idsString = ""; //string usado en la funcion IN de la consulta

        for ($i = 0; $i < count($arrayIds); $i++) { //Recorremos el array idsAmigos   
            if ($i == count($arrayIds) - 1) {
                $idsString = $idsString . strval($arrayIds[$i]); //agregamos al string de ids el id del usuario[$i]
            } else {
                $idsString = $idsString . strval($arrayIds[$i]); //agregamos al string de ids el id del usuario[$i]
                $idsString = $idsString . ", "; //añadimos un separador 
            }
        }

        /* Accedemos a la BD */
        $conexionBD = ConexionBD::getInstance();
        $conexionMYSQLI = $conexionBD->connectMYSQLI();

        $sqlObtenerPosts = "SELECT * FROM `post` WHERE idUsuario IN ($idsString) ORDER BY fechaPost DESC";

        $resultado = $conexionMYSQLI->query($sqlObtenerPosts); //ejecutamos la consulta y guardamos el resultado que devuelve (el nº de filas afectadas)

        $conexionMYSQLI->close(); //cerramos la conexion

        return $resultado;

    }

}
