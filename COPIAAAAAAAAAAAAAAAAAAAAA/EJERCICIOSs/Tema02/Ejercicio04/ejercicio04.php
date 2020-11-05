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
        /*
         * 1.- Haz un programa que te calcule la edad de una persona. Llama al 
         * script calculo_edad.php.
         */

        function calculaEdad($fechanacimiento) {
            list($anio, $mes, $dia) = explode("-", $fechanacimiento);
            $anioDiferencia = date("Y") - $anio;
            $mesDiferencia = date("m") - $mes;
            $diaDiferencia = date("d") - $dia;

            if ($diaDiferencia < 0 || $mesDiferencia < 0)
                $anioDiferencia--;

            return $anioDiferencia;
        }

        print "<br>" . calculaEdad('1992-1-9'); // Imprimirá: 28
        ?>

        <br>
        <hr>
        <br>

        <?php
        /*
         * 2.- Haz un script (num_dias.php) que dándole dos fechas me indique 
         * cuantos días hay entre ambas.
         */
        $fecha1 = mktime(0, 0, 0, 9, 1, 1999);
        $fecha2 = mktime(0, 0, 0, 9, 5, 1999);
        $resultado = $fecha2 - $fecha1;
        print "<br>" . "dias de diferencia: " . $resultado / (60 * 60 * 24);
        ?>

        <br>
        <hr>
        <br>

        <?php
        /*
         * 3.- Haz un script en php, que permita indicar cuántos minutos y 
         * cuántos segundos pasaron desde el inicio de la clase Por ejemplo: 
         * lunes 5 de octubre de 2015 a las 14:30hs si lo ejecuto a las 14:34h 
         * me debe indicar 4 minutos.
         */
        $fecha1 = mktime(14, 30, 0, 5, 10, 2015);
        $fecha2 = mktime(14, 34, 0, 5, 10, 2015);
        $resultado = $fecha2 - $fecha1;
        print "<br>" . "minutos de diferencia: " . $resultado / 60;
        ?>

        <br>
        <hr>
        <br>

        <?php
        /*
         * 4.- Configura la fecha del servidor como si estuvieras en México por 
         * ejemplo o en París.
         */
        date_default_timezone_set('Europe/Madrid');
        print "<br>" . date("d/m/y H:i a");

        date_default_timezone_set('Mexico/General');
        print "<br>" . date("d/m/y H:i a");
        ?>

        <br>
        <hr>
        <br>

    </body>
</html>
