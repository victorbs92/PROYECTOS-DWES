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
        <form id="productos" action="productos.php" method="post">
            <fieldset>
                <legend>
                    <h1>PRODUCTOS</h1>
                </legend>
                <div>
                    <label for="user">User: </label>
                    <input type="text" id="user" name="user" required>
                    <br>
                    <br>
                    <label for="pass">Pass: </label>
                    <input type="password" id="pass" name="pass" required>
                    <br>
                    <br>
                </div>
                <div>
                    <input type="submit" id="registrar" name="registrar" value="Registrar">
                </div>
            </fieldset>

            <?php
            //incluimos el acceso a la BD
            include './db_acceso.php';

            //si tenemos conexion...
            if ($conexion) {

                //guardamos la consulta sql en una variable
                $sqlConsultaProductos = "SHOW COLUMNS FROM productos";

                //preparamos, ejecutamos la consulta y guardamos el resultado que devuelve (el nº de filas afectadas) en una variable
                $resultado = $conexion->query($sqlConsultaProductos);

                $nombreColumn = mysqli_fetch_assoc($resultado); //Guarda en un array el nombre de las columnas de la tabla a la que se hace la consulta
               // print_r($nombreColumn);

                $clavesNombreColumn = array_keys($nombreColumn); //Guarda en un array las claves del array anterior para poder recorrerlo
                //print_r($clavesNombreColumn);
//
//                if ($resultado !== false) {
//
//                    print ("<table border = 1>"); //creamos la tabla
//                    //CABECERA DE LA TABLA
//                    print ("<tr>");
//                    foreach ($clavesNombreColumn as $value) {
////                        if ($value != "id" && $value != "imagen") {
////                            print "<th>$value</th>";
////                        }
//                    }
//                    print "<th>Borrar</th>";
//                    print ("</tr>");
//
//                    //CUERPO DE LA TABLA
//                    $resultado->execute();
//                    while ($datos = $resultado->fetch()) {
//                        print ("<tr>");
////                        print ("<td>" . $datos['titulo'] . "</td>");
////                        print ("<td>" . $datos['texto'] . "</td>");
////                        print ("<td>" . $datos['categoria'] . "</td>");
////                        print ("<td>" . $datos['fecha'] . "</td>");
////                        print ("<td>" . "<input type='checkbox' name=chkBorrar[] value=$datos[id]>" . "</td>");
//                        print ("</tr>");
//                    }
//                }
//
//                print ("</table>"); //cerramos la tabla
//
//                unset($conexion); //Cerramos la conexion
            }
            ?>

        </form>
    </body>
</html>
