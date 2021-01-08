


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

        <?php
        //INCLUDES & REQUIRES
        require_once("./utils/Session.php");

        /* SESION */
        Session::crearSesion($_GET['userSession']);

        if (isset($_SESSION['nombreUsuario'])) {//SI EL USUARIO SI SE HA AUTENTIFICADO CARGA LA PAGINA Y SU CONTENIDO
            ?>

            <form action="" method="post">
                <input type=submit name='cerrarSesion' value='Cerrar Sesión' >

                <?php
                if (isset($_POST['cerrarSesion'])) {//SI EL USUARIO pulsa el boton de cerrar sesion
                    /* eliminar sesion y cookie de sesion */
                    Session::eliminarSesion();
                    header("Location: ./registro.php"); //redirigimos a la pg registro.php
                }
                ?>

            </form>

            <?php
        } else { //SI EL USUARIO NO SE HA AUTENTIFICADO
            print "<h1>ERROR.</h1>";
            print "<a href=registro.php>Login</a></td>";
        }
        ?>

    </body>
</html>
