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
        <!-- 
        1.- La fecha del domingo de Pascua corresponde al primer domingo después
        de la primera luna que sigue al equinoccio de primavera. Los cálculos que
        permiten conocer esta fecha son: A=anio mod 19,B=anio mod 4, C=anio mod
        7, D=(19*A+24)mod 30, E=(2*B+4*C+6*D+5) mod 7, N=(22+D+E) Donde N
        indica el numero del día del mes de marzo (o abril si N superior a 31)
        correspondiente al domingo de Pascua. Realizar un programa que determine
        esa fecha para todos los años comprendidos entre 2007 y 2020.
        -->
        <?php
        for ($i = 2007; $i <= 2020; $i++) {
            print domingoPascua($i) . "<br>";
        }

        function domingoPascua($anio) {
            $a = $anio % 19;
            $b = $anio % 4;
            $c = $anio % 7;
            $d = (19 * $a + 24) % 30;
            $e = (2 * $b + 4 * $c + 6 * $d + 5) % 7;
            $n = (22 + $d + $e);
            return $n;
        }
        ?>
    </body>
</html>
