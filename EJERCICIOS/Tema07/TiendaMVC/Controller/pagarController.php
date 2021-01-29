<?php

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

/* SESION */
if (isset($_GET['userSession'])) { //si en el get existe userSession crea/carga una sesion
    Session::crearSesion($_GET['userSession']);
}

if (isset($_SESSION['nombreUsuario'])) {//si en la sesion existe la variable nombreUsuario (creada en el login)
    if (isset($_POST['volver'])) { //si se ha pulsado en volver
        header("Location: ../Controller/cestaController.php?userSession=" . session_name()); //redirige al controlador que maneja la cesta
    }

    if (isset($_POST['pagar'])) { //si se ha pulsado en pagar
        ProductoLDN::actualizarStockProductos(); //actualizamos el stock de la BD

        /* DESPUES DE PAGAR RESETEAMOS TODOS LOS DATOS DE LA SESION */
        unset($_SESSION['cesta']); //destruimos cestaSession
        unset($_SESSION['unidades']); //destruimos unidadesSession
        unset($_SESSION['productos']); //destruimos productosSession
        unset($_SESSION['factura']); //destruimos facturaSession
    }
    include_once '../View/pagarView.php'; //incluye la vista para mostrarla en pantalla
} else { //si en la sesion no existe la variable nombreUsuario (creada en el login) significa que se ha intentado acceder sin haber pasado por el login
    if (isset($_SESSION)) { //si existe una sesion significa que se ha intentado acceder escribiendo la url con un parametro en el get, asi que se borra esa sesion por temas de seguridad
        Session::eliminarSesion();
    }
    header("Location: ../Controller/errorController.php"); //redirige al controlador que maneja los errores
}