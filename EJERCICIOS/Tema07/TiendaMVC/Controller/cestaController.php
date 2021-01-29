<?php

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

/* SESION */
if (isset($_GET['userSession'])) { //si en el get existe userSession crea/carga una sesion
    Session::crearSesion($_GET['userSession']);
}


if (isset($_SESSION['nombreUsuario'])) {//si en la sesion existe la variable nombreUsuario (creada en el login)

    /* VARIABLES */
    $cesta = array();
    $unidadesProductoCesta = array();
    $arrayProductos = array();

    /* ISSETS */
    if (isset($_POST['vaciar'])) { //si se ha pulsado el boton vaciar cesta
        unset($_SESSION['cesta']); //destruimos cestaSession
        unset($_SESSION['unidades']); //destruimos unidadesSession
        unset($_SESSION['productos']); //destruimos productosSession
    }

    if (isset($_POST['eliminar'])) {
        $cesta = $_SESSION['cesta']; //se iguala la variable cesta con lo que hay guardado en la cestaSesion
        $unidadesProductoCesta = $_SESSION['unidades']; //se iguala el array a lo que hay en la unidadesSesion
        $arrayProductos = $_SESSION['productos']; //se iguala el array con lo que hay guardado en productosSesion
        $botonEliminarPulsado = array_key_first($_POST['eliminar']); //guardamos en una variable la key del array del boton añadir que hemos pulsado
        $idProductoEliminado = $cesta[$botonEliminarPulsado]->getIdProducto(); //guardamos en una variable el id del producto eliminado para poder buscar por ese id en el array de unidadesProductosCesta y restarle 1 al elemento que este en el indice con ese id
        @$unidadesProductoCesta[$idProductoEliminado]--; //restamos uno a la cantidad del producto que esta en ese indice del array
        $arrayProductos[$idProductoEliminado]->setStock($arrayProductos[$idProductoEliminado]->getStock() + 1); //aumentamos en 1 el stock

        if ($unidadesProductoCesta[$idProductoEliminado] == 0) {//si al eliminar el producto ya no quedan mas iguales, eliminamos su indice del array para que al volver a la pestaña productos no lo muestre en su cesta como un 0
            unset($unidadesProductoCesta[$idProductoEliminado]);
        }

        $_SESSION['unidades'] = $unidadesProductoCesta; //guardamos el array en la sesion
        unset($cesta[$botonEliminarPulsado]); //eliminamos del array cesta el elemento que tenga el mismo indice que el boton de eliminar que se haya pulsado
        $_SESSION['cesta'] = $cesta; //guardamos el array en la sesion
    }

    if (isset($_SESSION['cesta']) && isset($_SESSION['unidades'])) {//si las variables de sesion existen iguala los array con sus valores
        $cesta = $_SESSION['cesta']; //se iguala la variable cesta con lo que hay guardado en la cestaSesion
        $unidadesProductoCesta = $_SESSION['unidades']; //creamos un array donde los indices serán las claves de los productos y el valor sera la cantidad de ese mismo producto que se ha añadido a la cesta
    }

    if (isset($_POST['cerrarSesion'])) {
        header("Location: ../Controller/logOffController.php?userSession=" . session_name()); //redirige al controlador que maneja el logOff
    }

    if (isset($_POST['pagar'])) {
        header("Location: ../Controller/pagarController.php?userSession=" . session_name()); //redirige al controlador que maneja el pago
    }

    if (isset($_POST['volver'])) {
        header("Location: ../Controller/productosController.php?userSession=" . session_name()); //redirige al controlador que maneja los productos
    }

    $primerElemento = array_key_first($cesta); //obtiene la key del primer indice del array o devuelve null si esta vacio
    if (is_null($primerElemento)) { //si primerElemento es nulo
        unset($_SESSION['factura']); //se borra de la sesion el total de la cesta
        header("Location: ../Controller/productosController.php?userSession=" . session_name()); //redirige al controlador que maneja los productos
    } else {

        $propiedadesProducto = $cesta[$primerElemento]->getAllPropierties($cesta[$primerElemento]); //para acceder a las propiedades del objeto Producto, como son privadas, necesitamos este método implementado en la clase ProductoVO y que devuelve un array asociativo con las propiedades como key y los valores como value
        $totalEuros = 0;
        include_once '../View/cestaView.php'; //incluye la vista para mostrarla en pantalla

        $_SESSION['factura'] = $totalEuros; //se guarda el total de la cesta en la sesion
    }
} else { //si en la sesion no existe la variable nombreUsuario (creada en el login) significa que se ha intentado acceder sin haber pasado por el login
    if (isset($_SESSION)) { //si existe una sesion significa que se ha intentado acceder escribiendo la url con un parametro en el get, asi que se borra esa sesion por temas de seguridad
        Session::eliminarSesion();
    }
    header("Location: ../Controller/errorController.php"); //redirige al controlador que maneja los errores
}