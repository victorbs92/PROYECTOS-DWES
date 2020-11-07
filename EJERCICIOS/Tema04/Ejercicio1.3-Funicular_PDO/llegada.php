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
        <link href="estilo.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Llegada</h1>
        <form action="" method="post" class="formulario">
            <hr>
            <button type="submit" name="boton"  class="boton">llegada</button>
            <hr>
        </form>
        <?php
        if (isset($_POST['boton'])) {

            include './db_acceso.php';

            $flag = true;

            //INICIAMOS LA TRANSACCION
            $conexion->beginTransaction();

            $sqlBorradoPasajeros = 'DELETE FROM pasajeros';
            if ($conexion->exec($sqlBorradoPasajeros) == 0) {
                $flag = false;
            }

            $sqlUpdatePlazasReservadas0 = 'UPDATE plazas SET reservada = 0';
            if ($conexion->exec($sqlUpdatePlazasReservadas0) == 0) {
                $flag = false;
            }

            // Si todo fue bien, confirmamos los cambios y en caso contrario los deshacemos
            if ($flag == true) {
                $conexion->commit();
                echo "<p>Los cambios se han realizado correctamente.</p>";
            } else {
                $conexion->rollback();
                echo "<p>No se han podido realizar los cambios.</p>";
            }

            unset($conexion); //Cerramos la conexion
        }
        ?>
    </body>
</html>
