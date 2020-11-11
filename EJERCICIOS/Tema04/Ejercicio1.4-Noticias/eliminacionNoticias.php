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

        <?php
//        @$titulo = $_POST['titulo'];
//        @$texto = $_POST['texto'];
//        @$categoria = $_POST['categoria'];
//        $fecha = date("Y-m-d");
        //incluimos el acceso a la BD
        include './db_acceso.php';

        //si tenemos conexion...
        if ($conexion) {

            if (isset($_POST['eliminarNoticia'])) {//Validacion de envio de formulario
                if (!empty($_POST['chkBorrar'])) {//comprobamos que se haya seleccionado algun checkbox
                    //recorremos todas los checkbox seleccionados 
                    foreach ($_POST['chkBorrar'] as $selected) {

                        //guardamos la consulta sql en una variable
                        $sqlObtenerNoticia = "SELECT * FROM noticias WHERE id = $selected";

                        //preparamos, ejecutamos la consulta y guardamos el resultado que devuelve (el nº de filas afectadas) en una variable
                        $resultado = $conexion->prepare($sqlObtenerNoticia);
                        $resultado->execute();

                        $nombreColumn = $resultado->fetch(PDO::FETCH_ASSOC); //Guarda en un array el nombre de las columnas de la tabla a la que se hace la consulta

                        print "<p>Noticia eliminada: </p>";
                        print "<ul>";
                        print "<li>Título: $nombreColumn[titulo] </li>";
                        print "<li>Texto: $nombreColumn[texto]</li>";
                        print "<li>Categoría: $nombreColumn[categoria]</li>";
                        print "<li>Fecha: $nombreColumn[fecha]</li>";
                        print "</ul>";

                        $sqlEliminarNoticia = "DELETE FROM noticias WHERE id = $selected";

                        $todo_bien = true;

                        //INICIAMOS LA TRANSACCION
                        $conexion->beginTransaction();

                        if ($conexion->exec($sqlEliminarNoticia) == 0) {
                            $todo_bien = false; //Si hay error ponemos false
                        }

                        // Si todo fue bien, confirmamos los cambios y en caso contrario los deshacemos
                        if ($todo_bien == true) {
                            $conexion->commit();
                        } else {
                            $conexion->rollback();
                        }
                    }

                    print ("<p>" . "Número total de noticias eliminadas: " . count($_POST['chkBorrar']) . "</p>");
                } else {
                    print "<p>No has seleccionado ninguna noticia</p>";
                }
            }

            unset($conexion); //Cerramos la conexion
        }
        ?>

        [ <a href="eliminarNoticias.php">Eliminar otra noticia</a> ]

    </body>
</html>
