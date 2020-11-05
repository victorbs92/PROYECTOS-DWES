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
        // Averigua si un número es primo.
        $num = 23;
        $cont = 0;
        for ($i = 1; $i <= $num; $i++) {
            if ($num % $i == 0) {
                $cont++;
            }
        }
        if ($cont > 2) {
            print ("El número " . $num . " no es primo");
        } else {
            print ("El número " . $num . " si es primo");
        }
        ?>
    </body>
</html>
