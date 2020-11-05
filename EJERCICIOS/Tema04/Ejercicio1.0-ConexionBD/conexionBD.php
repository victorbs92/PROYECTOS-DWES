
<?php

// MYSQLI
$conexion = new mysqli('localhost', 'dwes', 'abc123', 'funicular'); //("localhost", "usuario", "contraseña", "basedatos")
print $conexion->server_info;
?>



<?php

// PDO
$dsn = 'mysql:host=localhost;dbname=funicular';
$usuario = 'dwes';
$contraseña = 'abc123';


try {
    $conexion = new PDO($dsn, $usuario, $contraseña); //CREAMOS LA CONEXION
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}

if (!$conexion) { //COMPROBAMOS LA CONEXION
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>