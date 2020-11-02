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
        2.- Realizar un programa que nos diga si dos números tecleados son amigos o
        no. Dos números son amigos si la suma de los divisores de uno (excepto el
        mismo) es igual al otro o viceversa.
        -->
        <?php
        $num1 = 4;
        $num2 = 6;

        if (numerosAmigos($num1, $num2)) {
            print "Los números $num1 y $num2 SI son amigos";
        } else {
            print "Los números $num1 y $num2 NO son amigos";
        }

        function numerosAmigos($num1, $num2) {
            $resultado1 = 0;
            $resultado2 = 0;
            for ($i = 1; $i < $num1; $i++) {
                if ($num1 % $i == 0) {
                    $resultado1 += $i;
                }
            }
            for ($j = 1; $j < $num2; $j++) {
                if ($num2 % $j == 0) {
                    $resultado2 += $j;
                }
            }
            if ($resultado1 == $resultado2) {
                return true;
            } else {
                return false;
            }
        }
        ?>
    </body>
</html>
