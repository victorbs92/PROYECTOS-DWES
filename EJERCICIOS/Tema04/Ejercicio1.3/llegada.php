<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Estacion Jorge Gregorio Maroto</title>
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
            @ $dwes = new mysqli("localhost", "root", "", "estacion" . "" . "");
            $error = $dwes->connect_errno;
            if ($error != null) {
                print"<p>Se ha producido el error: $dwes->connect_error.</p>";
                exit();
            }
            // Definimos una variable para comprobar la ejecucio?n de las consultas
            $todo_bien = true;
            // Iniciamos la transaccion
            $dwes->autocommit(false);
            $sql = 'delete from pasajeros';
            if ($dwes->query($sql) != true)
                $todo_bien = false;

            $sql = 'update plazas set reservada = 0';
            if ($dwes->query($sql) != true)
                $todo_bien = false;


            if ($todo_bien == true) {
                $dwes->commit();
                echo "<p>Los cambios se han realizado correctamente.</p>";
            } else {
                $dwes->rollback();
                echo "<p>No se han podido realizar los cambios.</p>";
            }

            $dwes->close();
        }
        ?>
    </body>
</html>
