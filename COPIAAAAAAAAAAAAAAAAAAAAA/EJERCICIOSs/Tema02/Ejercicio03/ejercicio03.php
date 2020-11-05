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
         * 1.- Obtén la fecha actual con formato día-mes-año.
         */
        print date("d-m-y");
        ?>

        <br>
        <hr>
        <br>

        <?php
        /*
         * 2.- Haz un script que reste un número de días a la fecha.
         */
        $diasRestados = 4;
        print "<br>" . $fechaActual = date("d-m-Y");
        print "<br>" . date("d-m-Y", strtotime($fechaActual . " - $diasRestados days"));
        ?>

        <br>
        <hr>
        <br>

        <?php
        /*
         * 3.- Haz un script en php que compruebe si una fecha dada es correcta 
         * o no e imprima en pantalla un mensaje.
         */
        $dia = 23;
        $mes = 8;
        $año = 2019;
        if (checkdate($mes, $dia, $año)) {
            print "<br>" . "la fecha es válida";
        } else {
            print "<br>" . "la fecha no es válida";
        }
        ?>

        <br>
        <hr>
        <br>

        <?php
        /*
         * 4.- Haz un script que calcule el número de días transcurridos desde 
         * una fecha dada a otra.
         */
        $fecha1 = mktime(0, 0, 0, 9, 1, 1999);
        $fecha2 = mktime(0, 0, 0, 7, 24, 2018);
        $resultado = $fecha2 - $fecha1;
        print "<br>" . "dias de diferencia: " . $resultado / (60 * 60 * 24);
        ?>

        <br>
        <hr>
        <br>

        <?php
        /*
         * 5.- Haz un script que sume un número de horas a una fecha.
         */
        $fecha1 = mktime(0, 0, 0, 1, 1, 2000);
        print "<br>" . date("d-m-Y", $fecha1);
        $horas = 25;
        $resultado = $fecha1 + ($horas * 60 * 60);
        print "<br>" . date("d-m-Y", $resultado);
        ?>

        <br>
        <hr>
        <br>

        <?php
        /*
         * 6.- Comprueba por pantalla el resultado de las siguientes 
         * comprobaciones si a las variables se les asignan los valores 8, 3 y 3.
         *   $a == $b
         *   $a != $b
         *   $a < $b
         *   $a > $b
         *   $a >= $c
         *   $a <= $c
         */
        $a = 8;
        $b = 3;
        $c = 3;
        if ($a == $b) {
            print "<br>" . "Cierto";
        } else {
            print "<br>" . "Falso";
        }
        if ($a != $b) {
            print "<br>" . "Cierto";
        } else {
            print "<br>" . "Falso";
        }
        if ($a < $b) {
            print "<br>" . "Cierto";
        } else {
            print "<br>" . "Falso";
        }
        if ($a > $b) {
            print "<br>" . "Cierto";
        } else {
            print "<br>" . "Falso";
        }
        if ($a >= $c) {
            print "<br>" . "Cierto";
        } else {
            print "<br>" . "Falso";
        }
        if ($a <= $c) {
            print "<br>" . "Cierto";
        } else {
            print "<br>" . "Falso";
        }
        ?>

        <br>
        <hr>
        <br>

        <?php
        /*
         * 7.- Haz lo mismo que en el ejercicio anterior pero con las 
         * instrucciones y tomando los mismos valores anteriores:
         *   ($a == $b) && ($c > $b)
         *   ($a == $b) || ($b == $c)
         *   ($b <= $c)
         */
        $a = 8;
        $b = 3;
        $c = 3;
        if (($a == $b) && ($c > $b)) {
            print "<br>" . "Cierto";
        } else {
            print "<br>" . "Falso";
        }
        if (($a == $b) || ($b == $c)) {
            print "<br>" . "Cierto";
        } else {
            print "<br>" . "Falso";
        }
        if ($b <= $c) {
            print "<br>" . "Cierto";
        } else {
            print "<br>" . "Falso";
        }
        ?>

        <br>
        <hr>
        <br>

        <?php
        /*
         * 8.- Hacer un programa que muestre en pantalla información de PHP con 
         * la función phpinfo(). Muestra la información centrada horizontalmente 
         * en la pantalla.
         */
        print "<br>" . phpinfo();
        ?>
        <br>
        <hr>
        <br>

    </body>
</html>
