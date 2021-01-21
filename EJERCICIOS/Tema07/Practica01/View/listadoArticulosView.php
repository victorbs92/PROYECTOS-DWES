
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



            </fieldset>
        </form>

    </body>
</html>