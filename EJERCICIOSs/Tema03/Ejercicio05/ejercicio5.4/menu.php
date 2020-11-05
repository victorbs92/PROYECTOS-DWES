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
        4.-Programa que nos pide un número entero positivo y luego nos permita
        realizar la opción que pulsemos en el siguiente menú:
        1.- contar cuantas cifras tiene
        2.- escriba sus 10 primeros multiplos
        3.- decir si es perfecto (Un número perfecto es un número
        natural que es igual a la suma de sus divisores propios positivos .
        Ejemplo 28 = 1 + 2 + 4 + 7 + 14)
        4.- salir
        -->
        <?php
        $num = 28;
        $menu = 4;
        switch ($menu) {
            case 1:
                print strlen($num);
                break;
            case 2:
                for ($i = 0; $i < 10; $i++) {
                    print "<br>" . $num * $i;
                }
                break;
            case 3:
                $resultado = 0;
                for ($i = 1; $i < $num; $i++) {
                    if ($num % $i == 0) {
                        $resultado += $i;
                    }
                }
                if ($resultado == $num) {
                    print "El número SI es perfecto";
                } else {
                    print "El número NO es perfecto";
                }
                break;
            case 4:
                exit;
                break;
            default:
                print "ERROR";
                break;
        }
        ?>
    </body>
</html>
