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
        <h2>Reserva de asiento</h2>

        <p><img src="icons/Víctor Bartolomé Sivelo - asteriscoRojo.png" alt="alt"/>Campo obligatorio</p>

        <form action="" class="formulario" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" required><br>

            <label for="asiento">Asiento:</label>
            <select name="asiento" id="asiento" required>
                <?php
                //incluimos el acceso a la BD
                include './db_acceso.php';

                //si tenemos conexion
                if ($conexion) {
                    //guardamos la consulta sql en una variable
                    $sqlConsultaPlazas = "SELECT * FROM plazas WHERE reservada = 0";

                    //ejecutamos la consulta y guardamos el resultado que devuelve (el nº de filas afectadas) en una variable
                    $resultado = $conexion->prepare($sqlConsultaPlazas);
                    $resultado->execute();


                    if ($resultado > 0) { //si el nº de filas afectadas por la consulta es mayor de 0 se muestran los datos
                        while ($datos = $resultado->fetch()) {
                            echo"<option value='${datos['numero']}'>";
                            echo"${datos['numero']} ( Precio: ${datos['precio']}€ )</option>";
                        }
                    }
                }
                ?>

            </select>

            </br>
            </br>

            <button type="submit" name="boton"  class="boton">Reservar</button>

            <?php
            if (isset($_POST['boton'])) {

                $nombre = $_POST['nombre'];
                $dni = $_POST['dni'];
                $asiento = $_POST['asiento'];

                $todo_bien = true; // Definimos una variable para comprobar la ejecución
                $conexion->beginTransaction(); // Iniciamos la transacción

                $sqlInsertarPasajero = "INSERT INTO pasajeros VALUES ('$dni','$nombre','-','$asiento')";
                if ($conexion->exec($sqlInsertarPasajero) == 0) {
                    $todo_bien = false; //Si hay error ponemos false
                }

                $sqlActualizarPlazaReservada = "UPDATE plazas SET reservada =1 WHERE numero ='$asiento'";
                if ($conexion->exec($sqlActualizarPlazaReservada) == 0) {
                    $todo_bien = false; //Si hay error ponemos false
                }

                // Si todo fue bien, confirmamos los cambios y en caso contrario los deshacemos
                if ($todo_bien == true) {
                    $conexion->commit();
                    print "<p>Se han actualizado los datos.</p>";
                    print "<p>Se ha reservado el asiento ${'asiento'}";
                } else {
                    $conexion->rollback();
                    print "<p>No se han podido realizar los cambios.</p>";
                }
            }
            ?>       
        </form>

    </body>
</html>