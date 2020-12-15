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
        //INCLUDES & REQUIRES
        require_once("./include/UsuarioVO.php");
        require_once("./include/UsuarioDAO.php");

        if (isset($_POST['registrar'])) {

            //guardamos los valores de los campos del formulario en variables
            @$user = $_POST['user'];
            @$pass = $_POST['pass'];

            $usuario = new UsuarioVO('NULL', $user, $pass); //creamos un objeto de la clase UsuarioVO

            $usuarioDAO = new UsuarioDAO(); //creamos un objeto de la clase UsuarioDAO

            switch ($usuarioDAO->insertarUsuario($usuario)) { //llamamos al metodo de la clase para insertar un usuario y le pasamos los datos como parametros y comprobamos el return en el switch
                case 1:
                    print "<p>El usuario ya existe.</p>";
                    break;

                case 2:
                    print "<p>ERROR.</p>";
                    break;

                case 3:
                    print "<p>Usuario creado con éxito.</p>";
                    break;

                default:
                    break;
            }
        }

        if (isset($_POST['login'])) {

            //guardamos los valores de los campos del formulario en variables
            @$user = $_POST['user'];
            @$pass = $_POST['pass'];

            $usuario = new UsuarioVO('NULL', $user, $pass); //creamos un objeto de la clase UsuarioVO

            $usuarioDAO = new UsuarioDAO(); //creamos un objeto de la clase UsuarioDAO

            $resultado = $usuarioDAO->obtenerUsuario($usuario); //pasamos a la funcion obtenerUsuario el usuario creado con los datos obtenidos de los campos del formulario para comprobar si existe en la BD y guardamos el resultado en la variable $resultado

            $row = $resultado->fetch_array(); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null

            if ($row == null) {//si el array es nulo
                print "<p>Usuario o contraseña incorrectas.</p>";
            } else {//si el array es distinto de null
                //SESION
                if (!isset($_SESSION)) {//comprobamos si no existe la sesion
                    session_start(); //creamos una sesion
                } else {//si ya existe la sesion la destruimos y creamos una nueva
                    session_destroy();
                    session_start();
                }
                $_SESSION['nombreUsuario'] = $user; //guardamos el nombreUsuario en la sesion
                header("Location: ./productos.php"); //redirigimos a la pg productos.php
            }
        }
        ?>
    </body>
</html>
