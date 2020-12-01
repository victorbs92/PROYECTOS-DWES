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
            session_start(); //creamos una sesion
        } else {//si ya existe la sesion la destruimos y creamos una nueva
            session_destroy();
            session_start();
        }

        if (isset($_POST['campousuario'])) {//comprobamos si campousuario se paso por el valor post
            $campousuario = $_POST['campousuario']; //guardamos el valor en una variable
        }
        if (isset($_POST['campoclave'])) {//comprobamos si campoclave se paso por el valor post
            $campoclave = $_POST['campoclave']; //guardamos en una variable
        }

        if (empty($campousuario) && empty($campoclave)) {//comprobamos que las variables no son empty
            print "ERROR!";
        } else {//si no son empty las guardamos en la session y mostramos el enlace a la tercera pagina
            $_SESSION['nombreUsuario'] = $campousuario; //guardamos el usuario en la sesion
            $_SESSION['claveUsuario'] = $campoclave; //guardamos la clave en la sesion

            //print_r($_SESSION);
            print "Se almacenaron dos variables de sesión";
            print "<br>";
            print "<a href='pagina3.php'>Ir a la tercera página donde se recuperan las variables de sesión</a>";
        }
        ?>
    </body>
</html>
