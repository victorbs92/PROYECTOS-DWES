<?php

/*
 * 1. Obtiene las noticias del día con un tope máximo de 10, ordenadas de la más 
 * reciente a la más antigua
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
    $resultado = $dwes->query('SELECT * from noticias WHERE fecha = CURRENT_DATE ORDER BY fecha DESC LIMIT 10', MYSQLI_STORE_RESULT); //consulta
    //BUCLE PARA RECORRER TODAS LAS FILAS DEL RESULTADO DE LA CONSULTA
    while ($registro = mysqli_fetch_array($resultado)) {
        print_r($registro);
        print "<br><br>";
    }

    if ($resultado) {
        print "<p> $dwes->affected_rows registros afectados.</p>"; //numero de filas afectadas
    }
}

//SE CIERRA LA CONEXION CON LA BD AL ACABAR
$dwes->close();
?>
