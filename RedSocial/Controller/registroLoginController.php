<?php

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

/* VARIABLES */
$mensaje = "";

if (isset($_POST['registrar'])) { //código que se ejecuta al pulsar el botón registrar

    /* guardamos los valores de los campos del formulario en variables */
    @$user = $_POST['user'];
    @$pass = $_POST['pass'];

    switch (UsuarioLDN::registrarUsuario($user, $pass)) {//se llama a la funcion registrarUsuario de UsuarioLDN y se comprueba su return
        case -1:
            $mensaje = "Usuario creado con éxito";
            break;

        case 1062:
            $mensaje = "El usuario ya existe.";
            break;

        default:
            $mensaje = "ERROR";
            break;
    }
}


if (isset($_POST['login'])) {//código que se ejecuta al pulsar el boton login
    /* guardamos los valores de los campos del formulario en variables */
    @$user = $_POST['user'];
    @$pass = $_POST['pass'];

    switch (UsuarioLDN::loginUsuario($user, $pass)) {//se llama a la funcion loginUsuario de UsuarioLDN y se comprueba su return
        case 1:
            header("Location: ../Controller/homeController.php?userSession=" . session_name()); //redirigimos a la pg listadoArticulos.php pasandole por el metodo GET el nombre de la sesion
            break;

        case 2:
            $mensaje = "El usuario no existe.";
            break;

        case 3:
            $mensaje = "La constraseña introducida no es correcta.";
            break;

        default:
            $mensaje = "ERROR";
            break;
    }
}

include_once '../View/registroLoginView.php'; //incluye la vista para mostrarla en pantalla



