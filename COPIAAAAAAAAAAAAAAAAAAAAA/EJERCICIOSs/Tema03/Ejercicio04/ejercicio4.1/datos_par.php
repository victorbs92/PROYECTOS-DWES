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
            ($num % 2 == 0) ? print "El número $num es PAR" : print "El número $num es IMPAR";
        }
        ?>
        <br><br>
        <a href="par.html">VOLVER</a>
    </body>
</html>
