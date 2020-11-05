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
        // Generar números que son capicúa entre 100 y 999 .
        for ($index = 100; $index < 1000; $index++) {
            if ($index == strrev($index)) {
                print "<br>" . ($index);
            }
        }
        ?>
    </body>
</html>
