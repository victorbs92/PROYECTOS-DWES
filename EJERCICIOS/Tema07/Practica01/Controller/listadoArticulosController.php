<?php

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

/* VARIABLES */


/* SESION */
Session::crearSesion($_GET['userSession']);
//Session::crearSesion("dwes");
//http://localhost/PROYECTOS-DWES/EJERCICIOS/Tema07/Practica01/View/listadoArticulosView.php

if (isset($_SESSION['nombreUsuario'])) {//SI EL USUARIO SI SE HA AUTENTIFICADO CARGA LA PAGINA Y SU CONTENIDO
    include_once '../View/listadoArticulosView.php'; //incluye la vista para mostrarla en pantalla

    print ("AAAAAAA");
} else {
    print ("BBBBB");
}

