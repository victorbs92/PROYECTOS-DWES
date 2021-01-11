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
        //Probar metodos 
        include("Cuenta.php");
        $cuenta1 = new Cuenta(123456789, "Pedro", 500);
        $cuenta1->ingreso(50);
        $cuenta1->reintegro(150);
        $cuenta1->esPreferencial(200);
        $cuenta1->mostrar();
        print "<br>";
        print "<br>";
        $cuenta2 = new CuentaCorriente(987654321, "Pepe", 750, 80);
        $cuenta2->reintegro(50);
        $cuenta2->mostrar();
        print "<br>";
        print "<br>";
        $cuenta3 = new CuentaAhorro(456789123, "Pablo", 900, 50, 20);
        $cuenta3->aplicaInteres();
        $cuenta3->mostrar();
        ?>
    </body>
</html>
