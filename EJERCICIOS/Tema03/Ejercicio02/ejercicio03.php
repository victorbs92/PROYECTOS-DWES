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
        <?php
        // Dada una cadena formada por una fecha. Validar si es correcta
        $fecha = "04-35-2020";

        function validaFecha($fecha) {
            $aux = explode("-", $fecha);
            if (checkdate($aux[0], $aux[1], $aux[2])) {
                print "<br>" . "la fecha es válida";
            } else {
                print "<br>" . "la fecha no es válida";
            }
        }

        print validaFecha($fecha);
        ?>
    </body>
</html>
