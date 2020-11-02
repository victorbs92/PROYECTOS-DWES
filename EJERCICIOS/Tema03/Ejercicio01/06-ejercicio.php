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
        // Calcular el factorial de un número utilizando la estructura for.
        $num = 4;
        $resul = 1;
        for ($i = 1; $i <= $num; $i++) {
            $resul = $i * $resul;
        }
        print $resul;
        ?>
    </body>
</html>
