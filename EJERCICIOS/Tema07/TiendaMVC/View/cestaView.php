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

        <form id = "cesta" action = "../Controller/cestaController.php?userSession=<?php print(session_name()) ?>" method = "post">
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

                <table border = 1 id="tablaCesta">
                    <tr>
                        <?php
                        /* CABECERA DE LA TABLA */
                        foreach ($propiedadesProducto as $key => $value) {//para conocer las claves solo necesitamos una fila devuelta, en este caso usamos la primera.
                            if ($key != "stock" && $key != "imagen") {
                                ?>
                                <th><?php print ($key) ?></th>
                                <?php
                            }
                        }
                        ?>
                        <th>Eliminar producto</th>
                    </tr>

                    <?php
                    /* CUERPO DE LA TABLA */
                    foreach ($cesta as $key => $value) {
                        ?>
                        <tr>
                            <?php
                            $propiedadesProducto = $cesta[$key]->getAllPropierties($cesta[$key]);

                            foreach ($propiedadesProducto as $key2 => $value2) {//recorremos las propiedades del objeto para imprimirlas en la tabla
                                if ($key2 != 'stock' && $key2 != 'imagen') {
                                    ?>
                                    <th><?php print ($value2) ?></th>
                                    <?php
                                }
                            }
                            ?>
                            <th><input type='submit' value='Eliminar' name='eliminar[<?php print($key) ?>]'></th> 
                        </tr>
                        <?php
                        $totalEuros += $cesta[$key]->getPrecio();
                    }
                    ?>

                    <tfoot>
                        <tr>
                            <td>TOTAL PRODUCTOS: <?php print(count($cesta)) ?> uds</td>
                            <td> IMPORTE TOTAL: <?php print($totalEuros) ?>€</td>
                        </tr>
                    </tfoot>
                </table>
                <br>

            </fieldset>
        </form>

    </body>
</html>
