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
        if (isset($_POST['numeroMenor']) && isset($_POST['numeroMayor'])) {

            $numMenor = $_POST['numeroMenor'];
            $numMayor = $_POST['numeroMayor'];
            $diferencia = $numMayor - $numMenor;

            print "LISTA DE PARES DE NÚMEROS DE $numMenor Y $numMayor : <br>";
            for ($i = 0; $i <= $diferencia; $i++) {
                print "($numMenor,$numMayor) ";
                $numMenor++;
                $numMayor--;
            }
        }
        ?>
        <br><br>
        <a href="numeros.html">VOLVER</a>
    </body>
</html>
