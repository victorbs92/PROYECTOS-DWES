<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>AMIGOS</title>
    </head>
    <body>

        <input type = "submit" name="cerrarSesion" value="Cerrar Sesión" form="amigos">

        <form id = "amigos" action = "../Controller/amigosController.php?userSession=<?php print(session_name()) ?>" method = "POST">
            <fieldset>
                <legend>
                    <h1>MI PERFIL</h1>
                </legend>
            </fieldset>



        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
