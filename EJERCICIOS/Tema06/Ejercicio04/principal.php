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
        require_once("./Coche.php");
        require_once("./Bombilla.php");

        function enciende_algo(encendible $algo) {
            $algo->encender();
        }

        $coche1 = new Coche(); //coche repostado
        $coche1->repostar(20);
        $coche2 = new Coche(); //coche no repostado
        enciende_algo($coche1);
        enciende_algo($coche2);

        $bombilla1 = new Bombilla(10);
        $bombilla2 = new Bombilla(20);
        enciende_algo($bombilla1);
        enciende_algo($bombilla2);
        ?>
    </body>
</html>
