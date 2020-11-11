<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Eliminación de noticias</h1>
        <form action="eliminacionNoticias.php" method="post">

            <?php
            //incluimos el acceso a la BD
            include './db_acceso.php';

            //si tenemos conexion...
            if ($conexion) {

                //guardamos la consulta sql en una variable
                $sqlConsultaNoticias = "SELECT * FROM noticias";

                //preparamos, ejecutamos la consulta y guardamos el resultado que devuelve (el nº de filas afectadas) en una variable
                $resultado = $conexion->prepare($sqlConsultaNoticias);
                $resultado->execute();

                $nombreColumn = $resultado->fetch(PDO::FETCH_ASSOC); //Guarda en un array el nombre de las columnas de la tabla a la que se hace la consulta
                $clavesNombreColumn = array_keys($nombreColumn); //Guarda en un array las claves del array anterior para poder recorrerlo

                if ($resultado !== false) {

                    print ("<table border = 1>"); //creamos la tabla
                    //CABECERA DE LA TABLA
                    print ("<tr>");
                    foreach ($clavesNombreColumn as $value) {
                        if ($value != "id" && $value != "imagen") {
                            print "<th>$value</th>";
                        }
                    }
                    print "<th>Borrar</th>";
                    print ("</tr>");

                    //CUERPO DE LA TABLA
                    print ("<tr>"); //ponemos todo este bloque de codigo porque al haber usado el fetch anteriormente cuando lo volvemos a usar en el while empieza a contar desde la 2ª columna
                    print ("<td>" . $nombreColumn['titulo'] . "</td>");
                    print ("<td>" . $nombreColumn['texto'] . "</td>");
                    print ("<td>" . $nombreColumn['categoria'] . "</td>");
                    print ("<td>" . $nombreColumn['fecha'] . "</td>");
                    print ("<td>" . "<input type='checkbox' name=chkBorrar[] value=$nombreColumn[id]>" . "</td>");
                    print ("</tr>");

                    while ($datos = $resultado->fetch()) {
                        print ("<tr>");
                        print ("<td>" . $datos['titulo'] . "</td>");
                        print ("<td>" . $datos['texto'] . "</td>");
                        print ("<td>" . $datos['categoria'] . "</td>");
                        print ("<td>" . $datos['fecha'] . "</td>");
                        print ("<td>" . "<input type='checkbox' name=chkBorrar[] value=$datos[id]>" . "</td>");
                        print ("</tr>");
                    }
                }

                print ("</table>"); //cerramos la tabla

                unset($conexion); //Cerramos la conexion
            }
            ?>

            <br>
            <input type="submit" id="eliminarNoticia" name="eliminarNoticia" value="Eliminar noticias Marcadas">
        </form>
    </body>
</html>
