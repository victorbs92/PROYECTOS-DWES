<?php
/*
 * AL ACCEDER A LA PG SE COMPRUEBA SI EXISTE EL PARÁMETRO "userSession" EN EL GET PARA CARGAR LA SESIÓN CUYO NOMBRE SERÁ EL VALOR DE ESE PARÁMETRO.
 * SE HA PROGRAMADO DE ESTA MANERA PARA QUE SI ALGUIEN INTENTA ACCEDER ESCRIBIENDO LA URL DE ESTA PG DIRECTAMENTE EN EL NAVEGADOR,
 * INCLUSO INCLUYENDO EN LA URL EL NOMBRE CORRECTO DE UNA SESION (MÉTODO GET), NO CARGUE LA PG Y LE ENVÍE A LA PG "errorView",
 * YA QUE A PESAR DE QUE ACCEDA DIRECTAMENTE PONIENDO LA URL EN EL NAVEGADOR CON EL NOMBRE DE SESIÓN INCLUIDO, LO CUAL CARGARÁ UNA SESIÓN, 
 * ESTA PG SOLO LA MOSTRARÁ SI EXISTE UNA VARIABLE CONCRETA DE SESIÓN QUE ES CREADA AL MOMENTO DE HACER LOGIN EN LA PG "registroLoginView".
 */

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

var_dump($_GET);
//var_dump($_POST);

/* SESION */
if (isset($_GET['userSession'])) {
    Session::crearSesion($_GET['userSession']);
}


/* VARIABLES */



if (isset($_SESSION['nombreUsuario'])) {//SI EL USUARIO SI SE HA AUTENTIFICADO CARGA LA PAGINA Y SU CONTENIDO
    print("AAAAAAA");
    if (isset($_POST['cerrarSesion'])) {
        print("BBBBBB");
    } else if (isset($_POST['verArticulo'])) {
        print ("CCCCCCCCC");
    } else {
        print ("DDDDDDDD");
        include_once '../View/listadoArticulosView.php'; //incluye la vista para mostrarla en pantalla
    }
} else { //SI EL USUARIO NO SE HA LOGUEADO EN LA PESTAÑA DE REGISTROLOGIN Y 
    print("EEEEEEEEEE");
    if (isset($_SESSION)) {
        print("FFFFFFFF");
        Session::eliminarSesion();
    }

    //header("Location: ../Controller/errorController.php");
}

