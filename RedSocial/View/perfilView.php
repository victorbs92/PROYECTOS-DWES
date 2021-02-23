<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PERFIL</title>
    </head>
    <body>

        <input type = "submit" name="cerrarSesion" value="Cerrar Sesión" form="miPerfil">
        <input type = "submit" name="home" value="HOME" form="miPerfil">

        <form id = "miPerfil" action = "../Controller/verPerfilController.php?userSession=<?php print(session_name()) ?>" method = "POST">
            <fieldset>
                <legend>
                    <h1>PERFIL DE <?php print($usuarioEncontrado) ?></h1>
                </legend>

                <label for="nombre">Nombre: </label>
                <input type="text"  id="nombre" maxlength="30" name="nombre" disabled="true" value=<?php print($miPerfil->getNombreUsuario()) ?> >
                <br><br>
                <label for="edad">Edad: </label>
                <input type="number" id="edad" min="0" name="edad" disabled="true" value=<?php print($miPerfil->getEdadUsuario()) ?> >
                <br><br>
                <label for="descripcion">Descripción: </label>
                <br>
                <textarea id="descripcion" name="descripcion" rows="10" cols="40" maxlength="2000" disabled="true"><?php print($miPerfil->getDescripcionUsuario()) ?></textarea>
                <br><br>
                <input type = "submit" name="volver" value="Volver">

            </fieldset>
        </form>

    </body>
</html>
