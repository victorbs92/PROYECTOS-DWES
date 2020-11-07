<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestión del funicular</title>
        <link href="estilo.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <h1>Gestion de plazas</h1>
        <?php
        //Incluimos la base de datos dentro del fichero
        include 'db_acceso.php';

        $instruccion = "SELECT * FROM plazas";

        $resultado = $conexion->prepare($instruccion);
        $resultado->execute();

        if ($resultado !== false) {
            // Mostrar datos de la noticia i-ésima
            print ("<table>\n");
            print ("<tr><th>Numero</th><th>Reservada</th><th>Precio</th></tr>\n");

            while ($datos = $resultado->fetch()) {
                print ("<tr>");
                print ("<td>" . $datos['numero'] . "</td>");
                print ("<td>" . $datos['reservada'] . "</td>");
                print ("<td>" . $datos['precio'] . "</td>");
                print ("</tr>");
            }

            print ("</tbody>");
            print ("</table>\n");
        }

        /* cerrar la conexión */
        unset($conexion);
        ?>
    </body>
</html>
