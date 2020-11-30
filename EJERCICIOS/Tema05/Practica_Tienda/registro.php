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
        <form id="accesoUsuario" action="registro.php" method="post">
            <fieldset>
                <legend>
                    <h1>ACCESO USUARIO</h1>
                </legend>
                <div>
                    <label for="user">User: </label>
                    <input type="text" id="user" name="user" required>
                    <br>
                    <br>
                    <label for="pass">Pass: </label>
                    <input type="password" id="pass" name="pass" required>
                    <br>
                    <br>
                </div>
                <div>
                    <input type="submit" id="registrar" name="registrar" value="Registrar">
                    <input type="submit" id="login" name="login" value="Login">
                </div>
            </fieldset>
        </form>
        <?php
        if (isset($_POST['registrar'])) {
            //incluimos el acceso a la BD
            include './db_acceso.php';

            //guardamos los valores de los campos del formulario en variables
            @$user = $_POST['user'];
            @$pass = $_POST['pass'];

            $sqlInsertarUsuario = "INSERT INTO usuarios VALUES ('NULL','$user','$pass')"; //consulta para insertar un nuevo usuario en la BD

            if (!$conexion->query($sqlInsertarUsuario)) {//si la consulta devuelve false
                $errorCode = mysqli_errno($conexion); //guardamos en una variable el codigo del error

                if ($errorCode == 1062) { //1062 = codigo de error para intentar insertar un dato duplicado en la tabla en el campo usuario porque esta como UNIQUE
                    print "<p>El usuario ya existe.</p>";
                } else {
                    $conexion->rollback(); //hacemos rollbacak
                    $conexion->close(); //cerramos la conexion
                    print "<p>ERROR.</p>";
                }
            } else {//si la consulta salió bien
                $conexion->commit(); //hacemos commit
                $conexion->close(); //cerramos la conexion
                print "<p>Usuario creado con éxito.</p>";
            }
        }

        if (isset($_POST['login'])) {
            //incluimos el acceso a la BD
            include './db_acceso.php';

            //guardamos los valores de los campos del formulario en variables
            @$user = $_POST['user'];
            @$pass = $_POST['pass'];

            $sqlComprobarUsuario = "SELECT * FROM `usuarios` WHERE nick = '$user' AND pass = '$pass'"; //consulta para comprobar que el usuario existe en la BD

            $resultado = $conexion->query($sqlComprobarUsuario); //ejecutamos la consulta y guardamos el resultado que devuelve (el nº de filas afectadas) en una variable

            $row = $resultado->fetch_array(); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null

            if ($row == null) {//si el array es nulo
                $conexion->close(); //cerramos la conexion
                print "<p>Usuario o contraseña incorrectas.</p>";
            } else {//si el array es distinto de null
                $conexion->close(); //cerramos la conexion
                //SESION
                if (!isset($_SESSION)) {//comprobamos si no existe la sesion
                    session_start(); //creamos una sesion
                } else {//si ya existe la sesion la destruimos y creamos una nueva
                    session_destroy();
                    session_start();
                    
                }
                $_SESSION['nombreUsuario'] = $user; //guardamos el usuario en la sesion
                header("Location: ./productos.php"); //redirigimos a la pg productos.php
            }
        }
        ?>
    </body>
</html>
