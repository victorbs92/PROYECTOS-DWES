<?php

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

/* SESION */
if (isset($_GET['userSession'])) { //si en el get existe userSession crea/carga una sesion
    Session::crearSesion($_GET['userSession']);
}

if (isset($_SESSION['nickUsuario'])) {//si en la sesion existe la variable nombreUsuario (creada en el login)
    $nickUsuario = $_SESSION['nickUsuario'];
    $mensajePublicacion = "";

    if (isset($_POST['miPerfil'])) { //si se ha pulsado el boton MIPERFIL
        header("Location: ../Controller/miPerfilController.php?userSession=" . session_name()); //redirigimos a la pg cesta.php
    }

    if (isset($_POST['amigos'])) { //si se ha pulsado el boton MIPERFIL
        header("Location: ../Controller/amigosController.php?userSession=" . session_name()); //redirigimos a la pg cesta.php
    }

    if (isset($_POST['publicar'])) { //si se ha pulsado el boton publicar
        $mensaje = $_POST['mensaje'];
        $añadirPostUsuario = HomeLDN::añadirPostUsuario($nickUsuario, $mensaje); //guardamos en una variable el resultado de añadir un post a la bd

        if ($añadirPostUsuario == true) {
            $mensajePublicacion = "Post publicado con éxito!";
        } else {
            $mensajePublicacion = "Error al publicar el Post, intentelo de nuevo";
        }
        $mensaje = "";
        unset($_SESSION['mensaje']); //destruimos cestaSession
    }
    /*
     * 
     * 
     * 
     * 
     */

    if (isset($_POST['verPerfil'])) {//si se ha pulsado el boton verPerfil
        $botonPulsado_nickUsuarioEncontrado = array_key_first($_POST['verPerfil']); //guardamos en una variable la key del array del boton verPerfil que hemos pulsado
        $_SESSION['nickUsuarioEncontrado'] = $botonPulsado_nickUsuarioEncontrado; //guardamos en la session el valor del botonPulsado que es el mismo valor que el nick del usuario encontrado
        header("Location: ../Controller/verPerfilController.php?userSession=" . session_name()); //redirige al controlador que maneja el verPerfil
    }

    if (isset($_POST['eliminar'])) {//si se ha pulsado el boton añadir
        $botonPulsado_nickUsuarioEncontrado = array_key_first($_POST['eliminar']); //guardamos en una variable la key del array del boton añadir que hemos pulsado que es igual al nick del usuario encontrado

        $resultado = AmigosLDN::eliminarAmigo($nickUsuarioActual, $botonPulsado_nickUsuarioEncontrado); //guardamos en una variable el resultado de llamar a añadirAmigo de la clase AmigoslLDN, que devolvera true si se añadio el amigo con exito o false si dio error

        if ($resultado == true) {//si el resultado es true
            $mensaje = "Usuario eliminado de amigos!";
        } else {//si el resultado es false
            $mensaje = "Error, no se ha podido eliminar el usuario a la lista de amigos.";
        }
    }

    $arrayPosts = HomeLDN::obtenerPosts($nickUsuario); //guardamos en un array el resultado de obtenerPosts
    $idUsuario = HomeLDN::obtenerIdUsuarioPorNick($nickUsuario); //guardamos en una variable el idUsuario

    if (isset($_POST['cerrarSesion'])) {//si se ha pulsado el boton cerrarSesion
        header("Location: ../Controller/logOffController.php?userSession=" . session_name()); //redirige al controlador que maneja el logOff
    }

    include_once '../View/homeView.php'; //incluye la vista para mostrarla en pantalla
} else { //si en la sesion no existe la variable nombreUsuario (creada en el login) significa que se ha intentado acceder sin haber pasado por el login
    if (isset($_SESSION)) { //si existe una sesion significa que se ha intentado acceder escribiendo la url con un parametro en el get, asi que se borra esa sesion por temas de seguridad
        Session::eliminarSesion();
    }
    header("Location: ../Controller/errorController.php"); //redirige al controlador que maneja los errores
}
