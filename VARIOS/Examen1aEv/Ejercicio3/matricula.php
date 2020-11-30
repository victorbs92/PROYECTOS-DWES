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
        <form id="matricula" action="matricula.php" method="post">
            <fieldset>
                <legend>
                    <h1>Matricula curso</h1>
                </legend>
                <div>
                    <label for="nombre">Nombre: </label>
                    <input type="text" id="nombre" name="nombre" required>
                    <br>
                    <br>
                    <label for="dni">DNI: </label>
                    <input type="text" id="dni" name="dni" required>
                    <br>
                    <br>
                    <label for="telefono">Telefono: </label>
                    <input type="tel" id="telefono" name="telefono" required>
                    <br>
                    <br>
                    <label for="edad">Edad: </label>
                    <input type="number" id="edad" name="edad" required>
                    <br>
                    <br>
                    <?php
                    //incluimos la conexion a la BD
                    include './db_acceso.php'; //ESTA CON ROOT Y NO CON ADMIN

                    $sqlObtenerClases = "SELECT * FROM clases"; //consulta para buscar las clases en la BD
                    $resultadoConsulta = $conexion->prepare($sqlObtenerClases); //preparamos la consulta y la ejecutamos
                    $resultadoConsulta->execute();
                    if ($resultadoConsulta !== false) {
                        // Mostrar datos de la noticia i-ésima

                        print "<label for='select'>Nivel: </label>";
                        print "<select name='select'>";

                        while ($datos = $resultadoConsulta->fetch()) {
                            print "<option value=$datos[codnivel]>$datos[nivel] $datos[dia] $datos[hora]</option>"; //mostramos resultados
                        }
                        print "</select>";
                    }

                    /* cerrar la conexión */
                    unset($conexion);
                    ?>
                </div>
                <br>
                <input type = "submit" name="matricularse" value="Matricularse">
            </fieldset>
            <?php
            //incluimos la conexion a la BD
            include './db_acceso.php'; //ESTA CON ROOT Y NO CON ADMIN



            if (isset($_POST['matricularse'])) {//si se ha pulsado el boton matricularse
                $value = $_POST['select'];
                $sqlObtenerClase = "SELECT * FROM clases WHERE codnivel = $value"; //consulta para buscar las clases en la BD
                $resultadoConsulta2 = $conexion->prepare($sqlObtenerClase); //preparamos la consulta y la ejecutamos
                $resultadoConsulta2->execute();

                if ($resultadoConsulta2 !== false) {//si la consulta no devuelve false 
                    $datos = $resultadoConsulta2->fetch();
                    print "Te has matriculado en el nivel $datos[nivel] los $datos[dia] a las $datos[hora]"; //mostramos resultados
                }

                //---------------------------------------------------------------------------------------------
                //guardamos en variables todos los campos del formulario para utilizarlos en la consulta
                $nombre = $_POST['nombre'];
                $dni = $_POST['dni'];
                $telefono = $_POST['telefono'];
                $edad = $_POST['edad'];
                $nivel = $datos['nivel'];
                $dia = $datos['dia'];
                $hora = $datos['hora'];


                //preparamos la consulta y utilizamos el bindParam para establecer los parametros
                $sqlInsertarAlumno = $conexion->prepare('INSERT INTO alumno (dni, nombre, telefono, edad, nivel, dia, hora) VALUES (?, ?, ?, ?, ?, ?, ?)'); //consulta de insercion
                $sqlInsertarAlumno->bindParam(1, $dni);
                $sqlInsertarAlumno->bindParam(2, $nombre);
                $sqlInsertarAlumno->bindParam(3, $telefono);
                $sqlInsertarAlumno->bindParam(4, $edad);
                $sqlInsertarAlumno->bindParam(5, $nivel);
                $sqlInsertarAlumno->bindParam(6, $dia);
                $sqlInsertarAlumno->bindParam(7, $hora);

                //ejecutamos la consulta
                $sqlInsertarAlumno->execute();

                if ($sqlInsertarAlumno !== false) {//si la consulta no devuelve false
                    $datos = $resultadoConsulta2->fetch();
                    print "<br>" . "Matricula realizada"; //mostramos resultados
                }

                //---------------------------------------------------------------------------------

                $sqlActualizarPlazasLibres = "UPDATE clases SET plazas_libres = (plazas_libres - 1) WHERE codnivel = $value"; //consulta de modificacion
                $resultadoConsulta3 = $conexion->prepare($sqlActualizarPlazasLibres); //preparamos la consulta y la ejecutamos
                $resultadoConsulta3->execute();
            }
            ?>
        </form>
    </body>
</html>
