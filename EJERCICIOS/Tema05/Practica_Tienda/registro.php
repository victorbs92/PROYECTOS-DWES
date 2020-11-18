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


        // header("Location: ./productos.php"); //redirigimos a la pg productos.php


        if (isset($_POST['login'])) {
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
        ?>
    </body>
</html>
