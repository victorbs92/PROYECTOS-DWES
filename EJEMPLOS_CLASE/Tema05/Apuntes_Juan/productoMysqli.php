<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Productos Mysqli</title>
    </head>
    <body>

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
        if($resultado){
        $row = $resultado->fetch_assoc();
        while ($row != null) {
            if ($usuarioIntroducido == $row["usuario"] && md5($passwordIntroducida) == $row["password"]) {
                $usuario = true;
                $password = true;
            }
            $row = $resultado->fetch_assoc();
        }
        $resultado->close();
        }

        if ($usuario != true || $password != true) {
            header('WWW-Authenticate: Basic Realm="Contenido restringido"');
            header('HTTP/1.0 401 Unauthorized');
            echo "Usuario no encontrado!";
            exit();
        }
        ?>

        <table border="1">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Nombre corto</th>
                    <th>descripcion</th>
                    <th>PVP</th>
                    <th>familia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $consulta = "SELECT * FROM producto";
                $resultado = $conexion->query($consulta);
                if ($resultado) {
                    $row=$resultado->fetch_assoc();
                    while ($row) {
                        echo "<tr><td>" . $row['cod'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['nombre_corto'] . "</td>";
                        echo "<td>" . $row['descripcion'] . "</td>";
                        echo "<td>" . $row['PVP'] . "</td>";
                        echo "<td>" . $row['familia'] . "</td>";
                        echo "</tr>";
                        $row=$resultado->fetch_assoc();
                    }
                    $resultado->close();
                }     
                ?>

            </tbody>
        </table>
    </body>
</html>