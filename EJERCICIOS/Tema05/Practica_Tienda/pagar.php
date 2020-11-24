<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action = "pagar.php" method = "post">
            <?php
            if (isset($_SESSION['nombreUsuario'])) { //SI EL USUARIO SI SE HA AUTENTIFICADO CARGA LA PAGINA Y SU CONTENIDO
                if (!empty($_SESSION['cesta'])) { //si cestaSession  no esta vacia
                    //incluimos el acceso a la BD
                    include './db_acceso.php';

                    $cantidadProductos = array(); //array donde se guardara como key el idProducto y como valor el nº de productos de ese mismo id

                    for ($index = 0; $index < count($_SESSION['cesta']); $index++) { //para recorrer una matriz necesitamos bucles anidados
                        if (array_key_exists($_SESSION['cesta'][$index]['idProducto'], $cantidadProductos)) { //comprueba si el idProducto del array por el que se llega el bucle existe como clave en el array cantidadProductos
                            $cantidadProductos[$_SESSION['cesta'][$index]['idProducto']]++;
                        } else {
                            $cantidadProductos[$_SESSION['cesta'][$index]['idProducto']] = 1;
                        }
                    }

                    foreach ($cantidadProductos as $key => $value) { //actualiza todo el stock de productos restando los que el usuario ha comprado al total
                        $consultaModificarCantidadStock = "UPDATE productos SET stock = (stock - $value) WHERE idProducto = $key";
                        if ($conexion->query($consultaModificarCantidadStock) != true) {
                            $conexion->rollback();
                        } else {
                            $conexion->commit();
                        }
                    }
                    $conexion->close(); //cerramos la conexion

                    unset($_SESSION['cesta']); //destruimos sessionCesta
                }
                print "<h1>GRACIAS POR SU COMPRA</h1>";
                print "<a href=productos.php>Volver a la tienda</a></td>";
            } else { //SI EL USUARIO NO SE HA AUTENTIFICADO
                print "<h1>ERROR.</h1>";
                print "<a href=registro.php>Login</a></td>";
            }
            ?>
    </body>
</html>
