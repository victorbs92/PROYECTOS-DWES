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

        if ($consulta = mysqli_query($conexion, $instruccion)) {

            // Mostrar datos de la noticia i-ésima
            print ("<table>\n");
            print ("<tr><th>Numero</th><th>Reservada</th><th>Precio</th></tr>\n");

            while ($resultado = mysqli_fetch_array($consulta)) {

                print ("<tr>");
                print ("<td>" . $resultado['numero'] . "</td>");
                print ("<td>" . $resultado['reservada'] . "</td>");
                print ("<td>" . $resultado['precio'] . "</td>");
                print ("</tr>");
            }
            print ("</tbody>");
            print ("</table>\n");
        }

        /* cerrar la conexión */
        mysqli_close($conexion);
        ?>
    </body>
</html>
