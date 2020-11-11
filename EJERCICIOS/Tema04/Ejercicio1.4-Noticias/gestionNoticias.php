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
        <h1>Gestión de noticias</h1>
        <h2>Resultado de la inserción de nueva noticia</h2>

        <?php
        @$titulo = $_POST['titulo'];
        @$texto = $_POST['texto'];
        @$categoria = $_POST['categoria'];
        $fecha = date("Y-m-d");

        //incluimos el acceso a la BD
        include './db_acceso.php';

        //si tenemos conexion...
        if ($conexion) {

            $todo_bien = true; // Definimos una variable para comprobar la ejecución
            $conexion->beginTransaction(); // Iniciamos la transacción

            $sqlInsertarNoticia = "INSERT INTO noticias VALUES (0, '$titulo', '$texto', '$categoria', '$fecha', NULL)";
            if ($conexion->exec($sqlInsertarNoticia) == 0) {
                $todo_bien = false; //Si hay error ponemos false
            }

            // Si todo fue bien, confirmamos los cambios y en caso contrario los deshacemos
            if ($todo_bien == true) {
                $conexion->commit();
                print "<p>La noticia ha sido recibida correctamente: </p>";
                print "<ul>";
                print "<li>Título: $titulo</li>";
                print "<li>Texto: $texto</li>";
                print "<li>Categoría: $categoria</li>";
                print "<li>Fecha: $fecha</li>";
                print "</ul>";
            } else {
                $conexion->rollback();
                print "<p>No se han podido realizar los cambios.</p>";
            }

            unset($conexion); //Cerramos la conexion
        }
        ?>

        [ <a href="insertarNoticia.php">Insertar otra noticia</a> ]

    </body>
</html>
