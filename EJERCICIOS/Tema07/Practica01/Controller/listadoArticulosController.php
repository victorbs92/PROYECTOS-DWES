<?php

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");



/* SESION */
if (isset($_GET['userSession'])) { //si en el get existe userSession crea una sesion
    Session::crearSesion($_GET['userSession']);
}

/* VARIABLES */


if (isset($_POST['cerrarSesion'])) {
    print("<br>");
    print("AAAAA");
} else if (isset($_POST['verArticulo'])) {
    
}


if (isset($_SESSION['nombreUsuario'])) {//SI EL USUARIO SI SE HA AUTENTIFICADO CARGA LA PAGINA Y SU CONTENIDO
    include_once '../View/listadoArticulosView.php'; //incluye la vista para mostrarla en pantalla
} else {
    if (isset($_SESSION)) {
        print ("GGGGGGG");
        Session::eliminarSesion();
    }

    //header("Location: ../Controller/errorController.php");
}

