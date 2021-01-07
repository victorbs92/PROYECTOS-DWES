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

        if (isset($_POST['registrar'])) { //código que se ejecuta al pulsar el botón registrar
            //guardamos los valores de los campos del formulario en variables
            @$user = $_POST['user'];
            @$pass = $_POST['pass'];

            $usuario = new UsuarioVO('NULL', $user, $pass); //creamos un objeto de la clase UsuarioVO

            $usuarioDAO = new UsuarioDAO(); //creamos un objeto de la clase UsuarioDAO

            /* llamamos al metodo de la clase para insertar un usuario y le pasamos los datos como parametros y comprobamos el return */
            if ($usuarioDAO->insertarUsuario($usuario) === true) { //si devuelve true
                print "<p>Usuario creado con éxito.</p>";
            } else {//si no devuelve true comprobamos el código de error que ha devuelto
                if ($usuarioDAO->insertarUsuario($usuario) === 1062) {
                    print "<p>El usuario ya existe.</p>";
                } else {
                    print "<p>ERROR.</p>";
                }
            }
        }

        if (isset($_POST['login'])) {//código que se ejecuta al pulsar el boton login
            //guardamos los valores de los campos del formulario en variables
            @$user = $_POST['user'];
            @$pass = $_POST['pass'];

            $usuario = new UsuarioVO('NULL', $user, $pass); //creamos un objeto de la clase UsuarioVO

            $usuarioDAO = new UsuarioDAO(); //creamos un objeto de la clase UsuarioDAO

            $resultado = $usuarioDAO->obtenerUsuario($usuario); //pasamos a la funcion obtenerUsuario el usuario creado con los datos obtenidos de los campos del formulario para comprobar si existe en la BD y guardamos el resultado en la variable $resultado

            $row = $resultado->fetch_array(); //guardamos las filas afectadas en un array, si no hay filas afectas devuelve null

            if ($row == null) {//si el array es nulo significa que el usuario no existe en la bd
                print "<p>El usuario no existe.</p>";
            } else {//si el array es distinto de null
                $hash = $row[0]; //guardamos en la variable $hash el resultado de la consulta, que contendrá el hash necesario para verificar la contraseña introducida en el campo Pass y así verificar si el usuario ha introducido la contraseña correcta

                if (password_verify($pass, $hash)) { //si la contraseña introducida es correcta
                    if (password_needs_rehash($hash, UsuarioVO::HASH, ['cost' => UsuarioVO::HASH])) {//comprobamos si la contraseña necesita "rehasearse" porque hay un algoritmo nuevo en PASSWORD_DEFAULT
                        $usuario->setPass($pass); //seteamos la contraseña (que será la misma que antes) para crear un nuevo hash y guardarlo en la bd
                        $usuarioDAO->passwordRehash($usuario);
                    }

                    //SESION
                    if (!isset($_SESSION)) {//comprobamos si no existe la sesion
                        //crear sesion
                        session_name($user);
                        session_start();
                        $_SESSION['nombreUsuario'] = $user; //guardamos el nombreUsuario en la sesion
                    } else {//si ya existe la sesion 
                        if (session_name() != $user) {//comprobamos si no es la misma para la que queremos loguear y si no lo es, la destruimos y creamos una nueva
                            //eliminar sesion y cookie de sesion
                            $_SESSION = array();
                            setcookie(session_name(), '', time() - 42000, '/');
                            session_destroy();
                            session_unset();
                        } else {
                            //crear sesion
                            session_name($user);
                            session_start();
                            $_SESSION['nombreUsuario'] = $user; //guardamos el nombreUsuario en la sesion
                        }
                    }

                    header("Location: ./productos.php"); //redirigimos a la pg productos.php
                } else {
                    print ("La constraseña introducida no es correcta.");
                }
            }
        }
        ?>
    </body>
</html>
