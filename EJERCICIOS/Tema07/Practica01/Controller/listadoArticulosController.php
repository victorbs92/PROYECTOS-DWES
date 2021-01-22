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


if (isset($_SESSION['nombreUsuario'])) {//si en la sesion existe la variable nombreUsuario (creada en el login)
    if (isset($_POST['cerrarSesion'])) {//si se ha pulsado el boton cerrarSesion
        header("Location: ../Controller/logOffController.php?userSession=" . session_name()); //redirige al controlador que maneja el logOff
    } else if (isset($_POST['verArticulo'])) {//si se ha pulsado alguno de los botones verArticulo
        header("Location: ../Controller/articuloController.php?userSession=" . session_name()); //redirige al controlador que llama a la vista articuloView
    } else {//si no se ha pulsado nada es que es la primera carga de la vista, asi que cargamos los datos y los mostramos en la vista
        $articulos = ArticuloLDN::obtenerArticulos(); //se llama a la funcion obtenerArticulos de ArticuloLDN y se comprueba su return, devuelve un array de Articulos o false si hubo algun error en el proceso de consultar a la BD
        include_once '../View/listadoArticulosView.php'; //incluye la vista para mostrarla en pantalla
    }
} else { //si en la sesion no existe la variable nombreUsuario (creada en el login) significa que se ha intentado acceder sin haber pasado por el login
    if (isset($_SESSION)) { //si existe una sesion significa que se ha intentado acceder escribiendo la url con un parametro en el get, asi que se borra esa sesion por temas de seguridad
        Session::eliminarSesion();
    }
    header("Location: ../Controller/errorController.php"); //redirige al controlador que maneja los errores
}


