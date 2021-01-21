<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Artículo</title>
    </head>
    <body>

        <input type = "submit" name="cerrarSesion" value="Cerrar Sesión" form="articulo">

        <form id = "articulo" action = "../Controller/listadoArticulosController.php?userSession=<?php print(session_name()) ?>" method = "POST">
            <fieldset>
                <legend>
                    <h1>ARTÍCULO</h1>
                </legend>



            </fieldset>
        </form>
        <?php
        ?>
    </body>
</html>
