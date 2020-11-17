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

        <h1>Hola!!</h1>
        <?php
//        echo "Nombre de usuario: " . $_SERVER['PHP_AUTH_USER'] . "<br />";
//        echo "Contraseña: " . $_SERVER['PHP_AUTH_PW'] . "<br />";
//        echo "Método de autentificación: " . $_SERVER['AUTH_TYPE'] . "<br />";
//      
//
//if (!isset($_SERVER['PHP_AUTH_USER'])) { 
//	header('WWW-Authenticate: Basic Realm="Contenido restringido"'); 
//	header('HTTP/1.0 401 Unauthorized');
//	echo "Usuario no reconocido!";
//	exit(); 
//}  


        if ($_SERVER['PHP_AUTH_USER'] != 'juan' || $_SERVER['PHP_AUTH_PW'] != 'juan') {
            header('WWW-Authenticate: Basic Realm="Contenido restringido"');
            header('HTTP/1.0 401 Unauthorized');
            echo "Usuario no reconocido!";
            exit();
        }
        ?>
    </body>
</html>
