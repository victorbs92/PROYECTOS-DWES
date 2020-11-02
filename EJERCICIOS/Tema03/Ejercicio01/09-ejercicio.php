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
        // Mostrar los siguientes valores:
        // 10 9 8 7 6 5 4 3 2 1
        // 9 8 7 6 5 4 3 2 1
        // 8 7 6 5 4 3 2 1
        // 7 6 5 4 3 2 1
        // 6 5 4 3 2 1
        // 5 4 3 2 1
        // 4 3 2 1
        // 3 2 1
        // 2 1
        // 1
        for ($i = 0; $i < 10; $i++) {
            for ($j = 10; $j > $i; $j--) {
                print ($j - $i . " ");
            }
            print "<br>";
        }
        ?>
    </body>
</html>
