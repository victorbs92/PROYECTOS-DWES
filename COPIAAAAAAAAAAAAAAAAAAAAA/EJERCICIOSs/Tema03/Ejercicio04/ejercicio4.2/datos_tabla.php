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
        if (isset($_POST['numero'])) {
            $num = $_POST['numero'];
            print "TABLA DE MULTIPLICAR DEL $num: ";
            for ($i = 1; $i <= 10; $i++) {
                print "<br> $i x $num = " . $i * $num;
            }
        }
        ?>
        <br><br>
        <a href="tabla.html">VOLVER</a>
    </body>
</html>
