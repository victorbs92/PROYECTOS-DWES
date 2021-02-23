<?php

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

/* SESION */
if (isset($_GET['userSession'])) { //si en el get existe userSession crea/carga una sesion
    Session::crearSesion($_GET['userSession']);
}

if (isset($_SESSION['nickUsuario'])) {//si en la sesion existe la variable nickUsuario (creada en el login)
    
    $nickUsuario = $_SESSION['nickUsuario']; //obtenemos el nick de la session
    
    if (isset($_POST['cerrarSesion'])) {//si se ha pulsado el boton cerrarSesion
        header("Location: ../Controller/logOffController.php?userSession=" . session_name()); //redirige al controlador que maneja el logOff
    }
    
    if (isset($_POST['home'])) {//si se ha pulsado el boton home
        header("Location: ../Controller/homeController.php?userSession=" . session_name()); //redirige al controlador que maneja el home
    }
    
    if (isset($_POST['guardar'])) {//si se ha pulsado el boton guardar
        
        //guardamos los datos pasado por el POST
        $nombreUsuario = $_POST['nombre'];
        $edadUsuario = $_POST['edad'];
        $descripcionUsuario = $_POST['descripcion'];
        
        $perfil = new PerfilVO('NULL', 'NULL', $nombreUsuario, $edadUsuario, $descripcionUsuario);//creamos un perfil con los datos de los que disponemos (los obtenidos de la vista)
        $miPerfil = PerfilLDN::actualizarPerfil($nickUsuario, $perfil); //llamamos a actualizarPerfil pasandole el nickUsuario para buscara traves de él, el id del usuario en la bd, y una vez conseguido el idUsuario, utilizarlo para obtener su perfil y poder actualizar los datos
       
    }
    
    
    $miPerfil = PerfilLDN::obtenerPerfil($nickUsuario); //guardamos en una variable el resultado de llamar a obtenerPerfil de la clase PerfilLDN, que devolvera un perfil con datos o un perfil vacio si no existen 

    include_once '../View/miPerfilView.php'; //incluye la vista para mostrarla en pantalla
} else { //si en la sesion no existe la variable nombreUsuario (creada en el login) significa que se ha intentado acceder sin haber pasado por el login
    if (isset($_SESSION)) { //si existe una sesion significa que se ha intentado acceder escribiendo la url con un parametro en el get, asi que se borra esa sesion por temas de seguridad
        Session::eliminarSesion();
    }
    header("Location: ../Controller/errorController.php"); //redirige al controlador que maneja los errores
}