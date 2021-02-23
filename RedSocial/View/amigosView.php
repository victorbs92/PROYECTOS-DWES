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
        <input type = "submit" name="home" value="HOME" form="amigos">


        <form id = "amigos" action = "../Controller/amigosController.php?userSession=<?php print(session_name()) ?>" method = "POST">
            <fieldset>
                <legend>
                    <h1>AMIGOS</h1>
                </legend>

                <input type="text"  id="buscarNombre" maxlength="30" name="buscarNombre" size="30" placeholder="Buscar por nombre de usuario" >
                <input type = "submit" id="botonBuscar" name="botonBuscar" value="Buscar Usuarios" >
                <br>
                <br>
                <?php
                print ($mensaje);
                if ($mensaje == "Usuario encontrado!") {
                    ?>
                    <br>
                    <br>
                    <label>Nick: <?php print($usuarioBuscado) ?> </label>
                    <input type="submit" value='Ver Perfil' name='verPerfil[<?php print($usuarioBuscado) ?>]'>
                    <?php
                    if ($resultado == true) {
                        ?>
                        <input type="submit" value='Elminar de AMIGOS' name='eliminar[<?php print($usuarioBuscado) ?>]'>
                        <?php
                    } else {
                        ?>
                        <input type="submit" value='Añadir a AMIGOS' name='añadir[<?php print($usuarioBuscado) ?>]'>
                        <?php
                    }
                }
                ?>
            </fieldset>

            <fieldset>

                <?php
                //SI NO HAY AMIGOS MOSTRAR UN MENSAJE
                //SI HAY AMIGOS MOSTRAR EN UNA TABLA
                print("BBBBBBBBBBBBBB");
                ?>


            </fieldset>

        </form>

    </body>
</html>
