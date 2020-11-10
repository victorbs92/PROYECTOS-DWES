<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Inserción nueva noticia</h1>
        <form class="formulario" action="gestionNoticias.php" method="post">
            <fieldset>
                <p>
                    <label for="titulo">Título: *</label>
                    <input type="text" name="titulo" id="titulo" required>   
                </p>
                <p>
                    <label for="texto">Texto: *</label>
                    <textarea name="texto" id="texto" required></textarea>
                </p>
                <p>
                    <label for="categoria">Categoría: </label>
                    <select name="categoria" id="categoria" required>
                        <?php
                        //incluimos el acceso a la BD
                        include './db_acceso.php';

                        //si tenemos conexion...
                        if ($conexion) {
                            //guardamos la consulta sql en una variable
                            $sqlConsultaCategorias = "SELECT DISTINCT categoria FROM noticias";

                            //ejecutamos la consulta y guardamos el resultado que devuelve (el nº de filas afectadas) en una variable
                            $resultado = $conexion->prepare($sqlConsultaCategorias);
                            $resultado->execute();


                            if ($resultado > 0) { //si el nº de filas afectadas por la consulta es mayor de 0 se muestran los datos
                                while ($datos = $resultado->fetch()) {
                                    echo"<option value='${datos[0]}'>";
                                    echo"${datos[0]}</option>";
                                }
                            }
                        }
                        ?>
                    </select>
                </p>
                <input type="submit" id="insertarNoticia" name="insertarNoticia" value="Insertar noticia">
            </fieldset>
        </form>
        <p>
            NOTA: los datos marcados con (*) deben ser rellenados obligatoriamente.
        </p>
        <?php
        if (isset($_POST['insertarNoticia'])) {

            @$titulo = $_POST['titulo'];
            @$texto = $_POST['texto'];
            @$categoria = $_POST['categoria'];
            $fecha = date("Y-m-d");

            $todo_bien = true; // Definimos una variable para comprobar la ejecución
            $conexion->beginTransaction(); // Iniciamos la transacción

            $sqlInsertarNoticia = "INSERT INTO noticias VALUES ('$titulo', '$texto', '$categoria', '$fecha')";
            if ($conexion->exec($sqlInsertarNoticia) == 0) {
                $todo_bien = false; //Si hay error ponemos false
            }

            // Si todo fue bien, confirmamos los cambios y en caso contrario los deshacemos
            if ($todo_bien == true) {
                $conexion->commit();
//                print "<p>Se han actualizado los datos.</p>";
//                print "<p>Se ha reservado el asiento ${'asiento'}";
            } else {
                $conexion->rollback();
//                print "<p>No se han podido realizar los cambios.</p>";
            }
        }
        ?>
    </body>
</html>
