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
        /*
         * 1.-Realiza un programa que calcule la media de tres números.
         */
        $var1 = 1;
        $var2 = 2;
        $var3 = 3;
        echo "<br>" . "La media de $var1 + $var2 + $var3 = " . ($var1 + $var2 + $var3) / 3
        ?>
        <br>
        <hr>
        <br>
        <?php
        /*
         * 2.- Realizar un programa que intercambie el valor de dos variables.
         */
        $var1 = 1;
        echo "<br>" . "Variable 1 = " . $var1;
        $var2 = 2;
        echo "<br>" . "Variable 2 = " . $var2;
        $aux;
        $aux = $var1;
        $var1 = $var2;
        $var2 = $aux;
        echo "<br>" . "Variable 1 = " . $var1;
        echo "<br>" . "Variable 2 = " . $var2;
        ?>
        <br>
        <hr>
        <br>
        <?php
        /*
         * 3.- Realizar el ordinograma de un programa que desglose una cantidad de
         * euros en billetes de 10 y 5 y monedas de 1 euro.
         */
        $euros = 37;

        $billete10 = 10;
        $billete5 = 5;
        $moneda1 = 1;

        $totalBilletes10 = (integer) ($euros / $billete10);
        $resto1 = $euros % $billete10;
        $totalBilletes5 = (integer) ($resto1 / $billete5);
        $resto2 = $resto1 % $billete5;
        $totalMonedas1 = $resto2 / $moneda1;

        echo "<br>" . "$euros € equivalen a $totalBilletes10 billetes de 10€, "
        . "$totalBilletes5 billetes de 5€ y $totalMonedas1 monedas de 1€";
        ?>
        <br>
        <hr>
        <br>
        <?php
        /*
         * 4.- Busca información sobre las distintas funciones de las que se 
         * dispone en php para realizar operaciones.
         */
        echo "<br>" . "abs(): devuelve el valor absoluto de un número.";
        echo "<br>" . "pow(): devuelve el valor de número elevado a un determinado expontente.";
        echo "<br>" . "max(): retorna el valor más alto.";
        echo "<br>" . "min(): retorna el valor más bajo.";
        echo "<br>" . "rand(): devuelve un número entero aleatorio.";
        echo "<br>" . "sqrt(): devuelve la raíz cuadrada.";
        echo "<br>" . "decbin(): convierte de decimal a binario.";
        ?>
        <br>
        <hr>
        <br>
    </body>
</html>
