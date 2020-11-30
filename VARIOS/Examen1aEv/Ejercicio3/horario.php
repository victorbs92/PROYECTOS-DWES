<?php
include_once('templates/header.php');
?>


<form class="formulario" action="" method="post" name="formulario">

    <ul>
        <li>
            <h2>Gestion de plazas</h2>

        </li>



        <li>
        <html> 
            <head> 
                <title>Horarios</title> 
            </head> 
            <body> 
                <h3>Horarios de clases disponibles</h3> 

                <?php
                //incluimos la conexion a la BD
                include './db_acceso.php'; //ESTA CON ROOT Y NO CON ADMIN

                $sqlObtenerClases = "SELECT * FROM clases"; //consulta para buscar las clases en la BD
                $resultadoConsulta = $conexion->query($sqlObtenerClases);
                ?> 
                <table border="1" cellspacing="1" cellpadding="1"> 
                    <tr>
                        <td>&nbsp;Nivel</td>
                        <td>&nbsp;Dia&nbsp;</td>
                        <td>&nbsp;Hora&nbsp;</td> 
                    </tr> 
                    <?php
                    if ($resultadoConsulta !== false) {
                        // Mostrar datos de la noticia i-ésima

                        while ($datos = $resultadoConsulta->fetch()) {
                            print ("<tr>");
                            print ("<td>" . $datos['nivel'] . "</td>");
                            print ("<td>" . $datos['dia'] . "</td>");
                            print ("<td>" . $datos['hora'] . "</td>");
                            print ("</tr>");
                        }
                    }

                    /* cerrar la conexión */
                    unset($conexion);
                    ?> 
                </table> 
                <br>
                <a href="index.php"><button type="button">VOLVER</button></a>
            </body> 
        </html> 


        <?php
        include_once('templates/footer.php');
        ?>