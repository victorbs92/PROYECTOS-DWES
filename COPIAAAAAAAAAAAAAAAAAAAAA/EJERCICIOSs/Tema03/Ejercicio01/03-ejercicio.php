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
        // Visualizar aquellos que cumplen que la suma de sus dígitos es igual 
        // al producto de los mismos. Por ejemplo: 123, donde 1*2*3 = 1+2+3
        for ($index = 0; $index < 1000; $index++) {
            if (array_sum(str_split("$index")) == array_product(str_split("$index"))) {
                print "<br>" . ($index) . " resultado: " . array_sum(str_split("$index"));
            }
        }
        ?>
    </body>
</html>
