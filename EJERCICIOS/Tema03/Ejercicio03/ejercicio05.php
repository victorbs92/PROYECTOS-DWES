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
         * Realiza un programa que contenga en un array el nombre de varios 
         * verbos regulares. El programa elegirá uno al azar y se conjugara el 
         * presente de indicativo de dicho verbo. Considerar verbos acabados en 
         * “ar”, “er” e “ir”
         */
        $verbos = ["mirar", "comer", "escribir", "saltar", "beber", "partir"];

        conjugar($verbos[rand(0, 5)]);

        function conjugar($verbo) {
            print ("<br>" . "INFINITIVO: $verbo");

            $primeraSingular = substr($verbo, 0, strlen($verbo) - 2) . "o";
            $primeraPlural = substr($verbo, 0, strlen($verbo) - 1) . "mos";

            if (substr($verbo, strlen($verbo) - 2) == "ar") {
                $segundaSingular = substr($verbo, 0, strlen($verbo) - 2) . "as";
                $terceraSingular = substr($verbo, 0, strlen($verbo) - 2) . "a";
                $segundaPlural = substr($verbo, 0, strlen($verbo) - 2) . "ais";
                $terceraPlural = substr($verbo, 0, strlen($verbo) - 2) . "an";
            } elseif (substr($verbo, strlen($verbo) - 2) == "er") {
                $segundaSingular = substr($verbo, 0, strlen($verbo) - 2) . "es";
                $terceraSingular = substr($verbo, 0, strlen($verbo) - 2) . "e";
                $segundaPlural = substr($verbo, 0, strlen($verbo) - 2) . "eis";
                $terceraPlural = substr($verbo, 0, strlen($verbo) - 2) . "en";
            } else {
                $segundaSingular = substr($verbo, 0, strlen($verbo) - 2) . "es";
                $terceraSingular = substr($verbo, 0, strlen($verbo) - 2) . "e";
                $segundaPlural = substr($verbo, 0, strlen($verbo) - 2) . "is";
                $terceraPlural = substr($verbo, 0, strlen($verbo) - 2) . "en";
            }

            print ("<br>" . "1ª singular: $primeraSingular");
            print ("<br>" . "2ª singular: $segundaSingular");
            print ("<br>" . "3ª singular: $terceraSingular");
            print ("<br>" . "1ª plural: $primeraPlural");
            print ("<br>" . "2ª plural: $segundaPlural");
            print ("<br>" . "3ª plural: $terceraPlural");
        }
        ?>
    </body>
</html>
