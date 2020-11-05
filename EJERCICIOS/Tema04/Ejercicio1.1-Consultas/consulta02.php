<?php

/*
 * 2. Inserta una noticia con los valores indicados:
 * id: 37
 * titulo: Nueva promoción en Nervión
 * texto: 145 viviendas de lujo en urbanización ajardinada situadas en un entorno privilegiado 
 * categoria: promociones
 * fecha: fecha actual
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
    $titulo = "Nueva promoción en Nervión";
    $texto = "145 viviendas de lujo en urbanización ajardinada situadas en un entorno privilegiado";
    $categoria = "promociones";
    $fecha = date("Y-m-d");

    //CONSULTA DE INSERCION
    $inser = "INSERT INTO noticias (id,titulo,texto,categoria,fecha) "
            . "values('$id','$titulo','$texto','$categoria','$fecha')";
    if (mysqli_query($dwes, $inser)) {
        echo "registro insertado<br>";
    } else {
        echo "error al insertar el registo<br>";
    }
}
//SE CIERRA LA CONEXION CON LA BD AL ACABAR
$dwes->close();
?>