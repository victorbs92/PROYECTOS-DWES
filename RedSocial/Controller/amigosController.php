<?php

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

/* SESION */
if (isset($_GET['userSession'])) { //si en el get existe userSession crea/carga una sesion
    Session::crearSesion($_GET['userSession']);
}

if (isset($_SESSION['nombreUsuario'])) {//si en la sesion existe la variable nombreUsuario (creada en el login)
    
    if (isset($_POST['cerrarSesion'])) {//si se ha pulsado el boton cerrarSesion
        header("Location: ../Controller/logOffController.php?userSession=" . session_name()); //redirige al controlador que maneja el logOff
    }
    
    if (isset($_POST['home'])) {//si se ha pulsado el boton cerrarSesion
        header("Location: ../Controller/homeController.php?userSession=" . session_name()); //redirige al controlador que maneja el home
    }
    
    if (isset($_POST['guardar'])) {//si se ha pulsado el boton cerrarSesion
       
    }
/*
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     */
    include_once '../View/miPerfilView.php'; //incluye la vista para mostrarla en pantalla
} else { //si en la sesion no existe la variable nombreUsuario (creada en el login) significa que se ha intentado acceder sin haber pasado por el login
    if (isset($_SESSION)) { //si existe una sesion significa que se ha intentado acceder escribiendo la url con un parametro en el get, asi que se borra esa sesion por temas de seguridad
        Session::eliminarSesion();
    }
    header("Location: ../Controller/errorController.php"); //redirige al controlador que maneja los errores
}