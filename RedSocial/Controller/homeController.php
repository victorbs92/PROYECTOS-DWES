<?php

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

/* SESION */
if (isset($_GET['userSession'])) { //si en el get existe userSession crea/carga una sesion
    Session::crearSesion($_GET['userSession']);
}

if (isset($_SESSION['nombreUsuario'])) {//si en la sesion existe la variable nombreUsuario (creada en el login)

    if (isset($_POST['miPerfil'])) { //si se ha pulsado el boton MIPERFIL
        header("Location: ../Controller/miPerfilController.php?userSession=" . session_name()); //redirigimos a la pg cesta.php
    }
    
    if (isset($_POST['amigos'])) { //si se ha pulsado el boton MIPERFIL
        header("Location: ../Controller/amigosController.php?userSession=" . session_name()); //redirigimos a la pg cesta.php
    }
    
    
    /*
    $arrayProductos = array(); //creamos un array numérico donde ir guardando todos los productos
    $cestaCompra = array(); //creamos un array donde ir guardando los productos añadidos a la cesta
    $unidadesProductoCesta = array(); //creamos un array donde los indices serán las claves de los productos y el valor sera la cantidad de ese mismo producto que se ha añadido a la cesta
    $totalEuros = 0;
    $totalProductos = 0;
    $costeTodasUdsMismoProducto = null;
    $botonAñadirPulsado = null;

    

    if (isset($_POST['vaciar'])) { //si se ha pulsado el boton vaciar cesta
        unset($_SESSION['cesta']); //destruimos cestaSession
        unset($_SESSION['unidades']); //destruimos unidadesSession
        unset($_SESSION['productos']); //destruimos productosSession
    }

    if (!isset($_SESSION['productos'])) {//si no existe en la sesion el array productos significa que es la primera vez que accedemos a la pg y obtenemos los datos de consultas a la BD
        $arrayProductos = ProductoLDN::obtenerProductos();
        $_SESSION['productos'] = $arrayProductos; //guardamos el array de productos en la sesion
    } else {//si el array productos si que existe en la sesion significa que no es la primera vez que accedemos a la pg y podemos ahorrarnos la consulta a la bd, seteando el valor del array con el guardado en la sesion
        $arrayProductos = $_SESSION['productos'];
    }

    if (isset($_POST['añadir'])) {//comprobamos si se ha enviado el formulario habiendo pulsado el boton de añadir
        $botonAñadirPulsado = array_key_first($_POST['añadir']); //guardamos en una variable la key del array del boton añadir que hemos pulsado

        if (isset($_SESSION['cesta'])) { //si se ha cargado la página y la sesionCesta existe, pinta la cesta, esto se ha hecho por si se ha vuelto a la pg desde la pg Cesta o desde la de iniciar sesion sin haber borrado la sesion previamente.
            $cestaCompra = $_SESSION['cesta']; //igualamos el valor del array cestaCompra con el que hay guardado en la sesion
            $unidadesProductoCesta = $_SESSION['unidades']; //igualamos el valor del array unidades con el que hay guardado en la sesion

            if ($arrayProductos[$botonAñadirPulsado]->getStock() > 0) { //si el stock del producto es superior a 0 antes de restarle 1 y añadirle a la cesta
                $arrayProductos[$botonAñadirPulsado]->setStock($arrayProductos[$botonAñadirPulsado]->getStock() - 1); //reducimos en 1 el stock
                $_SESSION['productos'] = $arrayProductos; //guardamos el array de productos en la sesion
                @$unidadesProductoCesta[$botonAñadirPulsado]++; //incrementamos el valor del array en la posicion del id del producto, se añade el operador de errores para que no marque error al incrementar cuando todavia no habia valor en ese indice
                $_SESSION['unidades'] = $unidadesProductoCesta; //guardamos en la sesion el valor del array
                array_push($cestaCompra, $arrayProductos[$botonAñadirPulsado]); //guardamos en el array cestaCompra el producto del arrayProductos que tenga el mismo id que el boton de añadir que se haya pulsado, como no interesa el indice en este array, simplemente lo pusheamos
                $_SESSION['cesta'] = $cestaCompra; //igualamos la cestaSession con el array cestaCompra al que se le acaba de añadir un nuevo producto
            }
        } else { //si cesta no existe en la sesion 
            if ($arrayProductos[$botonAñadirPulsado]->getStock() > 0) { //si el stock del producto es superior a 0 antes de restarle 1 y añadirle a la cesta
                $arrayProductos[$botonAñadirPulsado]->setStock($arrayProductos[$botonAñadirPulsado]->getStock() - 1); //reducimos en 1 el stock
                $_SESSION['productos'] = $arrayProductos; //guardamos el array de productos en la sesion
                array_push($cestaCompra, $arrayProductos[$botonAñadirPulsado]); //guardamos en el array cestaCompra el producto del arrayProductos que tenga el mismo id que el boton de añadir que se haya pulsado, como no interesa el indice en este array, simplemente lo pusheamos
                @$unidadesProductoCesta[$botonAñadirPulsado]++; //incrementamos el valor del array en la posicion del id del producto, se añade el operador de errores para que no marque error al incrementar cuando todavia no habia valor en ese indice
            }
            $_SESSION['cesta'] = $cestaCompra; //creamos cestaSession y guardamos en ella el array anterior
            $_SESSION['unidades'] = $unidadesProductoCesta; //guardamos en la sesion el valor del array
        }
    } else if (!isset($_POST['añadir']) && isset($_SESSION['cesta'])) { //si se ha cargado la página sin haber pulsado un boton de añadir y la sesionCesta existe pinta la cesta, esto se ha hecho por si se ha vuelto a la pg desde la pg Cesta o desde la de iniciar sesion sin haber borrado la sesion previamente.
        $cestaCompra = $_SESSION['cesta']; //igualamos el valor del array cestaCompra con el que hay guardado en la sesion
        $unidadesProductoCesta = $_SESSION['unidades']; //igualamos el valor del array unidades con el que hay guardado en la sesion
    }


    if (isset($_POST['cesta'])) { //si se ha pulsado el boton ver cesta
        if (!empty($_SESSION['cesta'])) { //si cestaSession  no esta vacia permite redirigir a cestaController
            header("Location: ../Controller/cestaController.php?userSession=" . session_name()); //redirigimos a la pg cesta.php
        }
    }*/

    if (isset($_POST['cerrarSesion'])) {//si se ha pulsado el boton cerrarSesion
        header("Location: ../Controller/logOffController.php?userSession=" . session_name()); //redirige al controlador que maneja el logOff
    }

    //$propiedadesProducto = $arrayProductos[array_key_first($arrayProductos)]->getAllPropierties($arrayProductos[array_key_first($arrayProductos)]); //guardamos en esta variable las propiedades de los productos
    include_once '../View/homeView.php'; //incluye la vista para mostrarla en pantalla
} else { //si en la sesion no existe la variable nombreUsuario (creada en el login) significa que se ha intentado acceder sin haber pasado por el login
    if (isset($_SESSION)) { //si existe una sesion significa que se ha intentado acceder escribiendo la url con un parametro en el get, asi que se borra esa sesion por temas de seguridad
        Session::eliminarSesion();
    }
    header("Location: ../Controller/errorController.php"); //redirige al controlador que maneja los errores
}
