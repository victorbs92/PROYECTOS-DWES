<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>LogOff</title>
    </head>
    <body>

        <form id="formulario" action="../Controller/logOffController.php?userSession=<?php print(session_name()) ?>" method="POST">
            <input type=submit name='cerrarSesion' value='Cerrar Sesión' >
        </form>

        <?php
        ?>

    </body>
</html>
