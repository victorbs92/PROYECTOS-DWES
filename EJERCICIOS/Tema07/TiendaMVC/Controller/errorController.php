<?php

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");


if (isset($_POST['salir'])) {
    if (isset($_SESSION)) {
        Session::eliminarSesion();
    }
    header("Location: ../Controller/registroLoginController.php"); //redirige al controlador del login
}

include_once '../View/errorView.php';




