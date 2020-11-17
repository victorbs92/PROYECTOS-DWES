<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>BIENVENIDO!</h1>
        <?php
        //Conexion con la base de datos
        $conexion = new mysqli("localhost", "root", "", "dwes");
        if ($conexion->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
            exit();
        }
        $usuario = false;
        $password = false;
        $usuarioIntroducido = $_SERVER['PHP_AUTH_USER'];
        $passwordIntroducida = $_SERVER['PHP_AUTH_PW'];
        $consulta = "SELECT * FROM usuarios";
        $resultado = $conexion->query($consulta);
        $row = $resultado->fetch_assoc();
        while ($row != null) {
            if ($usuarioIntroducido == $row["usuario"] && md5($passwordIntroducida) == $row["password"]) {
                $usuario = true;
                $password = true;
            }
            $row = $resultado->fetch_assoc();
        }

        if ($usuario != true || $password != true) {
            header('WWW-Authenticate: Basic Realm="Contenido restringido"');
            header('HTTP/1.0 401 Unauthorized');
            echo "Usuario no encontrado!";
            exit();
        }
        ?>
    </body>
</html>


