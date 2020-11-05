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
        <!-- 
        3.- Programa que simula el juego del doble o nada, para ello el usuario teclea
        la cantidad que apuesta, el ordenador genera aleatoriamente un 1 o un 2, si
        sale 1 gana el doble si sale 2 pierde todo. El ordenador le mostrará la
        cantidad a recibir si ha ganado o le dirá que ha perdido todo preguntándole
        cada vez si quiere volver a intentarlo.
        -->
        <?php
        $apuesta = 2;

        apostar($apuesta);

        function apostar($apuesta) {
            $r = random_int(1, 2);
            $r = 1 ? $apuesta * 2 : $apuesta = 0;
            return $apuesta;
        }
        ?>
    </body>
</html>
