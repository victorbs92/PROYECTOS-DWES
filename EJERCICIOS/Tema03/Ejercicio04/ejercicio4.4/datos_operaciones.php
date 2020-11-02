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
        if (isset($_POST['primerNumero']) && isset($_POST['segundoNumero']) && isset($_POST['operacion'])) {

            $primerNumero = $_POST['primerNumero'];
            $segundoNumero = $_POST['segundoNumero'];
            $operacion = $_POST['operacion'];

            switch ($operacion) {
                case "+":
                    print "El resultado de realizar la suma de los números $primerNumero y $segundoNumero es " . ($primerNumero + $segundoNumero);
                    break;
                case "-":
                    print "El resultado de realizar la resta de los números $primerNumero y $segundoNumero es " . ($primerNumero - $segundoNumero);
                    break;
                case "*":
                    print "El resultado de realizar el producto de los números $primerNumero y $segundoNumero es " . ($primerNumero * $segundoNumero);
                    break;
                case "/":
                    print "El resultado de realizar el cociente de los números $primerNumero y $segundoNumero es " . ($primerNumero / $segundoNumero);
                    break;
                default:
                    print "ERROR";
                    break;
            }
        }
        ?>
        <br><br>
        <a href="operaciones.html">VOLVER</a>
    </body>
</html>
