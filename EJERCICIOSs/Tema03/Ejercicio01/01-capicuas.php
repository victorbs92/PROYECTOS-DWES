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
         * Guardar con el nombre “capicúas”. Programa que indique si un número es
         * capicúa.
         */
        $num = 121;
        if ($num == strrev($num)) {
            print ("El número es capicua");
        } else {
            print ("El número no es capicua");
        }
        ?>
    </body>
</html>
