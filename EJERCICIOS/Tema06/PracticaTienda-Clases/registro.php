<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
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
        /* INCLUDES & REQUIRES */
        require_once("./include/UsuarioVO.php");
        require_once("./include/UsuarioDAO.php");
        require_once("./utils/Session.php");

        if (isset($_POST['registrar'])) { //código que se ejecuta al pulsar el botón registrar
            /* guardamos los valores de los campos del formulario en variables */
            @$user = $_POST['user'];
            @$pass = $_POST['pass'];

            registrarUsuario($user, $pass); //llamamos al metodo registrarUsuario
        }

        function registrarUsuario($user, $pass) { //metodo para registrar usuarios en la bd
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
            /* guardamos los valores de los campos del formulario en variables */
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

                    /* SESION */
                    Session::crearSesion($user); //llamamos al metodo estatico de la clase Session que recibe un argumento para dar nombre a la sesion y luego la crea
                    $_SESSION['nombreUsuario'] = $user; //guardamos en una variable de sesion el nombre del usuario

                    header("Location: ./registro.php?userSession=$user"); //redirigimos a la pg productos.php pasando por el metodo GET el nombre de la sesion del usuario en la URL 
                } else {
                    print ("La constraseña introducida no es correcta.");
                }
            }
        }
        ?>
    </body>
</html>
