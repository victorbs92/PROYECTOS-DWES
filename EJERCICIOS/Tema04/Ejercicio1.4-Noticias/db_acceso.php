<?php

@$dsn = 'mysql:host=localhost;dbname=lindavista';
@$usuario = 'dwes';
@$contraseña = 'abc123';


try {
    $conexion = new PDO($dsn, $usuario, $contraseña); //CREAMOS LA CONEXION
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}

if (!$conexion) { //COMPROBAMOS LA CONEXION
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>

