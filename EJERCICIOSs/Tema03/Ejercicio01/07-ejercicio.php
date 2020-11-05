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
        // Determinar el precio del billete de ida y vuelta en ferrocarril, conociendo
        // la distancia a recorrer y sabiendo que si el número de días de estancia
        // es superior a 7 y la distancia es superior a 800 km el billete tiene una
        // reducción del 30 por ciento. El precio por km es de 2.5€.
        $km = 900;
        $dias = 7;
        if ($km > 800 && $dias > 7) {
            print ("El billete cuesta: " . (($km * 2.5) - (($km * 2.5) * 0.30)));
        } else {
            print ("El billete cuesta: " . ($km * 2.5));
        }
        ?>
    </body>
</html>
