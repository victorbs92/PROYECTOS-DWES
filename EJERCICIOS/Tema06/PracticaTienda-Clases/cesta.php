
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
                    <input type = "submit" name="volver" value="Volver a la Tienda">
                    <br><br>

                    <?php
                    $cesta = $_SESSION['cesta']; //se iguala la variable cesta con lo que hay guardado en la cestaSesion

                    pintarCesta($cesta); //se llama a pintarCesta pasandole cesta como parametro

                    $sessionName = session_name(); //guardamos en una variable el nombre de la sesion para poder pasarlo por el GET

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
            $propiedadesProducto = $cesta[0]->getAllPropierties($cesta[0]); //para acceder a las propiedades del objeto Producto, como son privadas, necesitamos este método implementado en la clase ProductoVO y que devuelve un array asociativo con las propiedades como key y los valores como value
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

                $idValue = $cesta[$key]->getIdProducto(); //guardamos en una variable el valor del idProducto
                print "<th><input type='submit' value='Eliminar' name='eliminar[$idValue]'></th>"; //el name será un array y su indice será el idValue
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
        }
        ?>

    </body>
</html>
