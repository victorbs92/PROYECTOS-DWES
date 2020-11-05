<?php

$conexion = new mysqli('localhost', 'dwes', 'abc123', 'funicular'); //("localhost", "usuario", "contraseña", "basedatos")
print $conexion->server_info;
?>

