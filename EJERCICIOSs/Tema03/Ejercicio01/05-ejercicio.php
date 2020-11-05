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
        // Genera 10 valores de la siguiente serie 1/2, 2/4, 3/8, 4/16...
        $num1 = 1;
        $num2 = 1;
        for ($i = 1; $i <= 10; $i++) {
            print "<br>" . ($num1 * $i . "/" . $num2 * 2);
            $num2 = $num2 * 2;
        }
        ?>
    </body>
</html>
