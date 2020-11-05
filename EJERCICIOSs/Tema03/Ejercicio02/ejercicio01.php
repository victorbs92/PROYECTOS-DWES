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
        // Dados los valores capital, rédito y tiempo define las funciones:
        // interesSimple: calcula lo que produce el capital a interés simple.
        // interesCompuesto:  calcula lo que produce el capital a interés compuesto.
        // Indica cuál de los dos métodos es más beneficioso.
        $capital = 1000;
        $redito = 5;
        $tiempo = 30;

        function interesSimple($capital, $redito, $tiempo) {
            return $capital * $redito * $tiempo;
        }

        function interesCompuesto($capital, $redito, $tiempo) {
            return $capital * pow(1 + $redito, $tiempo);
        }

        print "<br>" . interesSimple($capital, $redito, $tiempo);
        print "<br>" . interesCompuesto($capital, $redito, $tiempo)
        ?>
    </body>
</html>
