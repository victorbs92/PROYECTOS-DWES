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
        // Obtener los números primos entre 3 y 9999.
        for ($i = 3; $i < 1000; $i++) {
            $cont = 0;
            for ($j = 1; $j < $i; $j++) {
                if ($i % $j == 0) {
                    $cont++;
                }
            }
            if ($cont < 2) {
                print ("<br>" . $i);
            }
        }
        ?>
    </body>
</html>
