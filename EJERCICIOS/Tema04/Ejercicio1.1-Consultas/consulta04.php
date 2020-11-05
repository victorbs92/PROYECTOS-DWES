<?php

/*
 * 4. Borra las noticias con más de 10 días de antigüedad
 */

//SE CREA LA CONEXION A LA BD
$dwes = new mysqli('localhost', 'dwes', 'abc123', 'lindavista');
print $dwes->server_info . "<br>";

//COMPRUEBA SI HAY ALGUN ERROR EN LA CONEXION
$error = $dwes->connect_errno;
if ($error != null) {
    echo "<p>Error $error conectando a la base de datos: $dwes->connect_error</p>";
    exit();
}

//SI NO HAY ERROR AL CONECTAR
if ($error == null) {

    //CONSULTA DE ELMININACION
    $borrar = "DELETE FROM noticias WHERE fecha < CURDATE()-10";
    if (mysqli_query($dwes, $borrar)) {
        echo "registro borrado<br>";
    } else {
        echo "error al borrar el registro<br>";
    }
}
//SE CIERRA LA CONEXION CON LA BD AL ACABAR
$dwes->close();
?>