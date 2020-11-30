<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (!isset($_SESSION)) {//comprobamos si no existe la sesion
            print "ERROR.";
        } else {//si ya existe la sesion 
            if (isset($_SESSION['nombreUsuario']) && isset($_SESSION['claveUsuario'])) {//comprobamos si las variables de session existen
                $campousuario = $_SESSION['nombreUsuario']; //guardamos el usuario en una variable
                $campoclave = $_SESSION['claveUsuario']; //guardamos la clave en una variable
                print "Nombre de usuario recuperado de la variable de sesion: $campousuario";
                print "<br>";
                print "La clave recuperada de la variable de sesion: $campoclave";
            } else {
                print "ERROR.";
            }
        }
        ?>
    </body>
</html>
