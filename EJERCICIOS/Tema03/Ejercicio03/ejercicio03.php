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
         * Realizar un programa  en PHP que nos permita calcular la letra del 
         * NIF  en base al DNI de una persona.
         * Para calcular la letra dividiremos el DNI por 23 y dependiendo del 
         * resto asignaremos la letra correspondiente.
         * Debes utilizar el array de letras {"T", "R", "W", "A", "G", "M", "Y",
         * "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", 
         * "K", "E"} para poder realizar la función.
         */
        $letras = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];
        $numero = 12345678;

        print (letraDni($numero, $letras));

        function letraDni($numero, $letras) {
            return $letras[$numero % 23];
        }
        ?>
    </body>
</html>
