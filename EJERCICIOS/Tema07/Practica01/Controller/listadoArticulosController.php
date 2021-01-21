<?php

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

var_dump($_GET);

/* SESION */
if (isset($_GET['userSession'])) {
    Session::crearSesion($_GET['userSession']);
}

/* VARIABLES */



if (isset($_SESSION['nombreUsuario'])) {//SI EL USUARIO SI SE HA AUTENTIFICADO CARGA LA PAGINA Y SU CONTENIDO
    if (isset($_POST['cerrarSesion'])) {
        print("<br>");
        print("AAAAA");
    } else if (isset($_POST['verArticulo'])) {
        
    } else {
        include_once '../View/listadoArticulosView.php'; //incluye la vista para mostrarla en pantalla
    }
} else {
    if (isset($_SESSION)) {
        Session::eliminarSesion();
    }
    
    //header("Location: ../Controller/errorController.php");
}

