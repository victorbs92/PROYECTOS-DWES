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
                <br><br>

                <fieldset>
                    <legend>
                        <h2>PUBLICAR</h2>
                    </legend>
                    <textarea id="mensaje" name="mensaje" rows="5" cols="60" maxlength="255" placeholder="Escribe aquí lo que quieras publicar en el tablón para que tus amigos puedan verlo."></textarea>
                    <br>
                    <input type = "submit" name="publicar" value="Publicar">
                    <br>
                    <br>
                    <?php
                    print ($mensajePublicacion);
                    ?>

                </fieldset>

                <fieldset>
                    <legend>
                        <h2>TABLÓN</h2>
                    </legend>


                    <?php
                    if (count($arrayPosts) == 0) {
                        print ("Aún no hay nada por aquí...");
                    } else {
                        //var_dump($arrayPosts);
                        for ($i = 0; $i < count($arrayPosts); $i++) { //Recorremos el array idsAmigos       
                            ?>
                            <textarea name="descripcion" rows="5" cols="60" disabled="true"><?php print($arrayPosts[$i]['mensaje']) ?></textarea>
                            <br>
                            <label>Publicado el <?php print($arrayPosts[$i]['fechaPost']) ?></label>
                            <hr>

                            <?php
                        }
                    }
                    ?>

                </fieldset>
            </fieldset>
        </form>

    </body>
</html>
