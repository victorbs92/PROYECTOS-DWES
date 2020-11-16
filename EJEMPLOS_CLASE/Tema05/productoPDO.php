<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Producto PDO</title>
    </head>
    <body>
        <?php
        //Conexion con la base de datos
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=dwes", "root", "");

            $usuario = false;
            $password = false;
            $usuarioIntroducido = $_SERVER['PHP_AUTH_USER'];
            $passwordIntroducida = $_SERVER['PHP_AUTH_PW'];
            $consulta = "SELECT * FROM usuarios";
            $resultado = $conexion->query($consulta);
            while ($row = $resultado->fetch()) {
                if ($usuarioIntroducido == $row["usuario"] && md5($passwordIntroducida) == $row["password"]) {
                    $usuario = true;
                    $password = true;
                }
            }
            if ($usuario != true || $password != true) {
                header('WWW-Authenticate: Basic Realm="Contenido restringido"');
                header('HTTP/1.0 401 Unauthorized');
                echo "Usuario no encontrado!";
                exit();
            }
        } catch (PDOException $excepcion) {
            echo "¡ERROR!, no se pudo conectar" . $excepcion->getMessage();
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
                
                $consulta="SELECT * FROM producto";
                try{
                    $conexion->beginTransaction();
                    $resultado=$conexion->query($consulta);
                    
                    while($row=$resultado->fetch()){
                        echo "<tr><td>".$row['cod']."</td>";
                        echo "<td>".$row['nombre']."</td>";
                        echo "<td>".$row['nombre_corto']."</td>";
                        echo "<td>".$row['descripcion']."</td>";
                        echo "<td>".$row['PVP']."</td>";
                        echo "<td>".$row['familia']."</td>";
                        echo "</tr>";
                    }
                    
                    $conexion->commit();
                }catch(Excepcion $e){                 
                    echo "Ha ocurrido algun error";
                    $conexion->rollBack();
                }
                ?>

            </tbody>
        </table>


    </body>
</html>