<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>HOME</title>
    </head>
    <body>

        <input type = "submit" name="cerrarSesion" value="Cerrar Sesión" form="home">

        <form id = "home" action = "../Controller/homeController.php?userSession=<?php print(session_name()) ?>" method = "POST">
            <fieldset>
                <legend>
                    <h1>HOME</h1>
                </legend>
                
                <input type = "submit" name="miPerfil" value="MI PERFIL">
                <input type = "submit" name="amigos" value="AMIGOS">

                <table border = 1 id="tablaProductos">
                    <tr>

                        <?php
                        /* CABECERA DE LA TABLA */
                        foreach ($propiedadesProducto as $key => $value) {
                            if ($key != "idProducto") {
                                ?>
                                <th><?php print($key) ?></th>
                                <?php
                            }
                        }
                        ?>
                        <th>Añadir al carrito</th>
                    </tr>
                    <?php
                    /* CUERPO DE LA TABLA */
                    foreach ($arrayProductos as $key => $value) {
                        ?>
                        <tr>
                            <?php
                            /* Para acceder a las propiedades del objeto, al ser private nos dara error, pero con el metodo getAllPropierties implementado en la clase
                              que recibe un objeto de su misma clase y con la funcion get_object_vars obtenemos un array asociativo con todas las propiedades y sus valores... */
                            $propiedadesProducto = $arrayProductos[$key]->getAllPropierties($arrayProductos[$key]);

                            foreach ($propiedadesProducto as $key2 => $value2) {//recorremos las propiedades del objeto para imprimirlas en la tabla
                                if ($key2 == 'imagen') {
                                    ?>
                                    <th><img border='0' width='100' height='100' src='../img/<?php print($value2) ?>.jpg' ></th>
                                    <?php
                                } else if ($key2 != 'idProducto') {
                                    ?>
                                    <th><?php print ($value2) ?></th>
                                    <?php
                                }
                            }

                            $idValue = $arrayProductos[$key]->getIdProducto(); //guardamos en una variable el valor del idProducto
                            ?>

                            <th><input type='submit' value='Añadir' name='añadir[<?php print($idValue) ?>]'></th>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </fieldset>

            <fieldset>
                <h1>CESTA</h1>

                <ul>
                    <?php
                    /* RESUMEN CESTA */
                    foreach ($unidadesProductoCesta as $key => $value) {
                        $costeTodasUdsMismoProducto = $arrayProductos[$key]->getPrecio() * $value;
                        ?>
                        <li>
                            <span> <?php print ($arrayProductos[$key]->getNombreProducto() . "  X  " . $value . "  =  " . $costeTodasUdsMismoProducto . " €") ?></span>
                        </li>
                        <?php
                        $totalEuros = $totalEuros + $arrayProductos[$key]->getPrecio() * $value;
                        $totalProductos = $totalProductos + $value;
                    }
                    ?>
                </ul>
                <?php
                if ($totalProductos == 0) {
                    ?>
                    <p>Aún no hay nada por aquí</p>
                    <?php
                } else {
                    ?>
                    <p>TOTAL PRODUCTOS EN LA CESTA:  <?php print ($totalProductos) ?> uds</p>
                    <p>IMPORTE TOTAL:  <?php print ($totalEuros) ?> €</p>
                    <?php
                }
                ?>

                <br><br>
                <input type = "submit" name = "cesta" value = "Ver cesta">
                <input type = "submit" name = "vaciar" value = "Vaciar cesta">
            </fieldset>
        </form>

    </body>
</html>
