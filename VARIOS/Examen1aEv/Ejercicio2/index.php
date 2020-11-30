<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio2</title>
        <link href="dwes.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <form action="index.php" method="post">
            Ingrese el mail del usuario:
            <input type="text" name="mail"><br>
            <input type="submit" name='buscar' value="buscar">
        </form>
        <?php
        //incluimos la conexion a la BD
        include './db_acceso.php'; //ESTA CON ROOT Y NO CON ADMIN

        if ($conexion) { //si tenemos conexion
            if (isset($_POST['buscar'])) {//si se ha pulsado el boton buscar
                //guardamos los valores de los campos del formulario en variables
                @$mail = $_POST['mail'];

                $sqlBuscarUsuario = "SELECT * FROM usuarios WHERE email = '$mail'"; //consulta para buscar el email en la BD
                $resultadoConsulta = $conexion->query($sqlBuscarUsuario);

                if ($resultadoConsulta == false) {//si la consulta devuelve false
                    print "<p>ERROR.</p>";
                    $conexion->close(); //cerramos la conexion
                } else {//si la consulta salió bien
                    $numColumnas = $resultadoConsulta->num_rows; //comprobamos el numero de columnas afectadas por la consulta
                    if ($numColumnas > 0) {//si devuelve alguna fila
                        if (!isset($_SESSION)) {//comprobamos si no existe la sesion
                            session_start(); //creamos una sesion
                        } else {//si ya existe la sesion la destruimos y creamos una nueva
                            session_destroy();
                            session_start();
                        }
                        $arrayResultado = $resultadoConsulta->fetch_all(MYSQLI_ASSOC); //el resultado es un array que contiene un array por cada fila devuelta (array de arrays)(matriz)
                        $nombreUsuario = $arrayResultado[0]['usuario']; //guardamos el nombre de usuario en una variable
                        $_SESSION['nombreUsuario'] = $nombreUsuario; //lo guardamos en una variable de sesion
                        header("Location: ./mostrarNombre.php"); //redirigimos a la pestaña que muestra  el nombre
                    } else {//si no devuelve ninguna fila
                        print "EMAIL NO ENCONTRADO";
                    }
                    $conexion->close(); //cerramos la conexion
                }
            }
        } else {
            print "ERROR";
        }
        ?>
    </body>
</html> 
