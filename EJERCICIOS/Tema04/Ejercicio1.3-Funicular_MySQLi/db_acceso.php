<?php

$conexion = new mysqli('localhost', 'dwes', 'abc123', 'funicular'); //("localhost", "usuario", "contraseña", "basedatos")

$error = $conexion->connect_errno;

if ($error != null) {
    print"<p>Se ha producido el error: $conexion->connect_error.</p>";
    exit();
} else {
    print ("Connected successfully");
    print $conexion->server_info;
}
?>

