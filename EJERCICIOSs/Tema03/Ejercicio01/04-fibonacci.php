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
        //Guardar con el nombre “fibonacci”.
        //0, 1, 1, 2, 3, 5, 8, 13…
        $num1 = 0;
        $num2 = 1;
        for ($i = 0; $i <= 10; $i++) {
            $resul = $num1 + $num2;
            $num1 = $num2;
            $num2 = $resul;
            print ($resul . " ");
        }
        ?>
    </body>
</html>
