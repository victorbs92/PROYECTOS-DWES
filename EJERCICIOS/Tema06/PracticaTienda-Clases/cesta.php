
<?php
//INCLUDES & REQUIRES
require_once("./utils/Session.php");
require_once("./include/ProductoVO.php");

/* SESION */
Session::crearSesion($_GET['userSession']);
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cesta</title>
    </head>
    <body>

        <?php
        if (isset($_SESSION['nombreUsuario'])) {//SI EL USUARIO SI SE HA AUTENTIFICADO CARGA LA PAGINA Y SU CONTENIDO
            ?>

            <form id = "cesta" action = "" method = "post">
                <input type = "submit" name="cerrarSesion" value="Cerrar Sesión" form="cesta">
                <fieldset>
                    <legend>
                        <h1>CESTA</h1>
                    </legend>
                    <input type = "submit" name="pagar" value="Pagar">
                    &nbsp;
                    <input type = "submit" name = "vaciar" value = "Vaciar cesta">
                    &nbsp;
                    <input type = "submit" name="volver" value="Volver a la Tienda">
                    <br><br>

                    <?php
                    $cesta = array();
                    $unidades = array();

                    if (isset($_POST['vaciar'])) { //si se ha pulsado el boton vaciar cesta
                        unset($_SESSION['cesta']); //destruimos cestaSession
                        unset($_SESSION['unidades']); //destruimos unidadesSession
                    }

                    if (isset($_POST['eliminar'])) {
                        $cesta = $_SESSION['cesta']; //se iguala la variable cesta con lo que hay guardado en la cestaSesion
                        $unidadesProductoCesta = $_SESSION['unidades']; //creamos un array donde los indices serán las claves de los productos y el valor sera la cantidad de ese mismo producto que se ha añadido a la cesta

                        $botonEliminarPulsado = array_key_first($_POST['eliminar']); //guardamos en una variable la key del array del boton añadir que hemos pulsado
                        $idProductoEliminado = $cesta[$botonEliminarPulsado]->getIdProducto(); //guardamos en una variable el id del producto eliminado para poder buscar por ese id en el array de unidadesProductosCesta y restarle 1 al elemento que este en el indice con ese id
                        @$unidadesProductoCesta[$idProductoEliminado]--; //restamos uno a la cantidad del producto que esta en ese indice del array

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

                    $sessionName = session_name(); //guardamos en una variable el nombre de la sesion para poder pasarlo por el GET

                    if (is_null(pintarCesta($cesta))) { //se llama a pintarCesta pasandole cesta como parametro y si devuelve null porque la cesta esta vacia (por haber eliminado todos los productos) redirige directamente a la pestaña productos
                        header("Location: ./productos.php?userSession=$sessionName"); //redirigimos a la pg productos.php
                    }

                    if (isset($_POST['cerrarSesion'])) {
                        header("Location: ./logoff.php?userSession=$sessionName"); //redirigimos a la pg logoff.php
                    }

                    if (isset($_POST['pagar'])) {
                        header("Location: ./pagar.php?userSession=$sessionName"); //redirigimos a la pg pagar.php
                    }

                    if (isset($_POST['volver'])) {
                        header("Location: ./productos.php?userSession=$sessionName"); //redirigimos a la pg pagar.php
                    }
                    ?>

                </fieldset>
            </form>

            <?php
        } else { //SI EL USUARIO NO SE HA AUTENTIFICADO
            print "<h1>ERROR.</h1>";
            print "<a href = registro.php>Login</a></td>";
        }
        ?>
        <?php

        function pintarCesta($cesta) {
            $primerElemento = array_key_first($cesta); //obtiene la key del primer indice del array o devuelve null si esta vacio

            if (is_null($primerElemento)) { //si primer elemento es nulo no pinta nada y devuelve null
                return null;
            }
            $propiedadesProducto = $cesta[$primerElemento]->getAllPropierties($cesta[$primerElemento]); //para acceder a las propiedades del objeto Producto, como son privadas, necesitamos este método implementado en la clase ProductoVO y que devuelve un array asociativo con las propiedades como key y los valores como value
            $totalEuros = 0;

            print ("<table border = 1>"); //creamos la tabla
            print ("<tr>");

            /* CABECERA DE LA TABLA */
            foreach ($propiedadesProducto as $key => $value) {//para conocer las claves solo necesitamos una fila devuelta, en este caso usamos la primera.
                if ($key != "stock" && $key != "imagen") {
                    print "<th>$key</th>";
                }
            }
            print "<th>Eliminar producto</th>";
            print ("</tr>");

            /* CUERPO DE LA TABLA */
            foreach ($cesta as $key => $value) {
                print ("<tr>");

                $propiedadesProducto = $cesta[$key]->getAllPropierties($cesta[$key]);

                foreach ($propiedadesProducto as $key2 => $value2) {//recorremos las propiedades del objeto para imprimirlas en la tabla
                    if ($key2 != 'stock' && $key2 != 'imagen') {
                        print "<th>$value2</th>";
                    }
                }

                print "<th><input type='submit' value='Eliminar' name='eliminar[$key]'></th>"; //el name será un array y su indice será la key de esa iteracion del array cesta (numerico ascendente)
                print ("</tr>");

                $totalEuros += $cesta[$key]->getPrecio();
            }

            /* PIE DE LA TABLA */
            print ("<tfoot>");
            print ("<tr>");
            print ("<td>TOTAL PRODUCTOS: " . count($cesta) . "uds</tf>");
            print ("<td> IMPORTE TOTAL: " . $totalEuros . "€</tf>");
            print ("</tr>");
            print ("</tfoot>");
            print "</table>";
            print "<br>";

            return true;
        }
        ?>

    </body>
</html>
