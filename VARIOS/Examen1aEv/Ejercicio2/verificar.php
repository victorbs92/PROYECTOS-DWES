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
        <link href="dwes.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
        if (!isset($_SESSION)) {//comprobamos si no existe la sesion
            print "ERROR.";
        } else {//si ya existe la sesion 
            if (isset($_SESSION['nombreUsuario'])) {//comprobamos si las variables de session existen
                $nombreUsuario = $_SESSION['nombreUsuario']; //guardamos el usuario en una variable
                print "Hola $nombreUsuario";
                print "<br>";
            } else {
                print "No puede visitar esta página.";
            }
        }
        ?>
    </body>
</html>
