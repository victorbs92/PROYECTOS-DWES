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
        <form action="logoff.php" method="post">
            <?php
            if (!isset($_SESSION)) {//comprobamos si no existe la sesion
                session_start(); //creamos una sesion
            } else {//si ya existe la sesion la destruimos y creamos una nueva
                session_destroy();
                session_start();
            }

            if (isset($_SESSION['nombreUsuario'])) {//SI EL USUARIO SI SE HA AUTENTIFICADO CARGA LA PAGINA Y SU CONTENIDO
                print "<input type=submit name='cerrarSesion' value='Cerrar Sesión' >";

                if (isset($_POST['cerrarSesion'])) {//SI EL USUARIO pulsa el boton de cerrar sesion
                    session_destroy();
                    header("Location: ./registro.php"); //redirigimos a la pg registro.php
                }
            } else { //SI EL USUARIO NO SE HA AUTENTIFICADO
                print "<h1>ERROR.</h1>";
                print "<a href=registro.php>Login</a></td>";
            }
            ?>
        </form>
    </body>
</html>
