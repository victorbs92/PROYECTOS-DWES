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
        // Dado un número, definir un conjunto de funciones para hacer una serie
        //  de comprobaciones como: decir si es capicúa, para redondearle,  
        //  decir el número de dígitos que tiene. Todos los resultados se 
        //  muestran en el proceso principal.
        $num = 111;

        function capicua($num) {
            if ($num == strrev($num)) {
                print ("El número es capicua");
            } else {
                print ("El número no es capicua");
            }
        }

        function redondeo($num) {
            return round($num);
        }

        function digitos($num) {
            return strlen($num);
        }

        capicua($num);
        print "<br>" . redondeo($num);
        print "<br>" . digitos($num);
        ?>
    </body>
</html>
