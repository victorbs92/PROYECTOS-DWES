
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado Artículos</title>
    </head>
    <body>

        <input type = "submit" name="cerrarSesion" value="Cerrar Sesión" form="articulos">

        <form id = "articulos" action = "../Controller/listadoArticulosController.php?userSession=<?php print(session_name()) ?>" method = "POST">
            <fieldset>
                <legend>
                    <h1>ARTÍCULOS</h1>
                </legend>

                <?php
                if ($arrayArticulos !== null) {
                    ?>
                    <table border = 1>
                        <tr>
                            <th>Título</th>
                            <th>Fecha</th>
                            <th>Ver artículo</th>
                        </tr>
                        <?php
                        foreach ($arrayArticulos as $key => $value) {
                            ?>
                            <tr>
                                <td><?php print($value->getTituloArticulo()) ?></td>
                                <td><?php print($value->getFechaArticulo()) ?></td>
                                <td><input type='submit' value='Ver artículo' name='verArticulo[<?php print($value->getIdArticulo()) ?>]'></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <?php
                } else {
                    ?>
                    <p>Aún no hay nada por aquí...</p>
                    <?php
                }
                ?>


            </fieldset>
        </form>

    </body>
</html>