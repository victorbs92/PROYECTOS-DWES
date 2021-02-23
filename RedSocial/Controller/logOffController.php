<?php

/*
 * AL ACCEDER A LA PG, SE COMPRUEBA SI EXISTE EL PARÁMETRO "userSession" EN EL GET, EL VALOR DE ESTE PARÁMETRO SERÁ EL UTILIZADO PARA CARGAR LA SESIÓN.
 * SE HA PROGRAMADO DE ESTA MANERA PARA QUE, SI ALGUIEN INTENTA ACCEDER ESCRIBIENDO LA URL DE ESTA PG DIRECTAMENTE EN EL NAVEGADOR (INCLUSO INCLUYENDO
 * EN LA URL EL NOMBRE CORRECTO DE UNA SESIÓN - MÉTODO GET -), NO CARGUE LA PG, BORRE LA SESIÓN Y LE ENVÍE A LA PG "errorView".
 * ESTO ES ASÍ PORQUE, A PESAR DE QUE ACCEDA DIRECTAMENTE PONIENDO LA URL EN EL NAVEGADOR CON EL NOMBRE DE SESIÓN INCLUIDO (QUE CARGARÁ UNA SESIÓN), 
 * ESTA PG SOLO LA MOSTRARÁ SI EXISTE UNA VARIABLE CONCRETA DE SESIÓN, QUE ES CREADA AL MOMENTO DE HACER LOGIN EN LA PG "registroLoginView".
 */


/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");


/* SESION */
if (isset($_GET['userSession'])) { //si en el get existe userSession crea/carga una sesion
    Session::crearSesion($_GET['userSession']);
}


if (isset($_SESSION['nickUsuario'])) {//si en la sesion existe la variable nombreUsuario (creada en el login)
    if (isset($_POST['cerrarSesion'])) {//si el usuario pulsa el boton de cerrar sesion
        if (isset($_SESSION)) { //si existe una sesion
            Session::eliminarSesion(); //eliminar sesion y cookie de sesion
        }
        header("Location: ../Controller/registroLoginController.php"); //redirige al controlador del login
    }
} else {
    if (isset($_SESSION)) { //si existe una sesion significa que se ha intentado acceder escribiendo la url con un parametro en el get, asi que se borra esa sesion por temas de seguridad
        Session::eliminarSesion(); //eliminar sesion y cookie de sesion
    }
    header("Location: ../Controller/errorController.php"); //redirige al controlador que maneja los errores
}


include_once '../View/logOffView.php';
