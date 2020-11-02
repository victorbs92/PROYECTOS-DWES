<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../estilo.css" rel="stylesheet" type="text/css" />
        <title>Ejercicio 1.2 Consultas</title>
    </head>
    <body>
        <h1>Consulta de viviendas</h1>
        <?php
        $conexion = new mysqli('localhost', 'dwes', 'abc123', 'lindavista');
        $error = $conexion->connect_errno;

        if ($error == null) {
            $resultado = $conexion->query('SELECT * from viviendas ORDER BY precio ASC');
            if ($resultado) {
                print "
                           <table>
                              <tr>
                                <th>Tipo</th>
                                <th>Zona</th>
                                <th>Dormitorios</th>
                                <th>Precio</th>
                                <th>Tamaño</th>
                                <th>Extras</th>
                                <th>Fotos</th>
                              </tr>";
                while ($registro = mysqli_fetch_array($resultado)) {
                    print"<tr>";
                    print"<td>" . $registro[1] . "</td>";
                    print"<td>" . $registro[2] . "</td>";
                    print"<td>" . $registro[4] . "</td>";
                    print"<td>" . $registro[5] . "</td>";
                    print"<td>" . $registro[6] . "</td>";
                    print"<td>" . $registro[7] . "</td>";
                    print"<td><a href=../fotos/" . $registro[8] . "  target='_blank'><img border='0'src='../fotos/ico-fichero.gif'></a></td>";
                    print "</tr>";
                }
            }
            $conexion->close();
        } else {
            print "<p>no funciona</p>";
        }
        ?>

    </body>
</html>
