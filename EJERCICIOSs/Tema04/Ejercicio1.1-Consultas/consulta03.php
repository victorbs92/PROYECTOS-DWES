<?php

/*
 * 3. Modifica la categoría de la noticia con id=37 de la tabla con promiciones: oferta
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

    //DATOS A INTRODUCIR
    $id = 37;
    $categoria = "ofertas";

    //CONSULTA DE MODIFICACION
    $modi = "UPDATE noticias SET categoria = '$categoria' WHERE id = '$id'";
    if (mysqli_query($dwes, $modi)) {
        echo "registro modificado<br>";
    } else {
        echo "error al modificar el registro<br>";
    }
}
//SE CIERRA LA CONEXION CON LA BD AL ACABAR
$dwes->close();
?>