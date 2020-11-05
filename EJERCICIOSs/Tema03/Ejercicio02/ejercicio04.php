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
         * Dada una c/c determina si es correcta. La CC tiene que tener el 
         * formato (entidad-oficina-dígitos de control-cuenta). 
         * Mostrar el código de la entidad. 
         * Mostrar el código de la oficina. 
         * Mostrar el número de la cuenta (solamente el número de cuenta, 
         * sin entidad, oficina ni dígitos de control). 
         * Mostrar los dígitos de control de la cuenta. 
         * Comprobar que el código de control es correcto, para ello, se deben 
         * generar y comparar.
         */
        //$cuenta = "0123-4567-89-0123456789"; //CUENTA NO VÁLIDA
        //$cuenta = "7434-2536-74-5229505572"; //CUENTA VÁLIDA

        print comprobarCuenta($cuenta);

        function comprobarCuenta($cuenta) {
            $aux = explode("-", $cuenta);
            $entidad = $aux[0];
            $oficina = $aux[1];
            $numControl = $aux[2];
            $numCuenta = $aux[3];
            $dig1 = comprobarDigitoControl1($cuenta);
            $dig2 = comprobarDigitoControl2($cuenta);

            print "<br>" . "El código de la entidad es: $entidad";
            print "<br>" . "El código de la oficina es: $oficina";
            print "<br>" . "Los dígitos de control son: $numControl";
            print "<br>" . "El número de la cuenta es: $numCuenta";

            if ($dig1 == $numControl[0] && $dig2 == $numControl[1]) {
                print "<br>" . "Los dígitos de control son correctos.";
            } else {
                print "<br>" . "Los dígitos de control no son correctos, los correctos son: $dig1 y $dig2";
            }
        }

        function comprobarDigitoControl1($cuenta) {
            $aux = explode("-", $cuenta);
            $entidad = $aux[0];
            $oficina = $aux[1];
            $resultado = 11 - ($entidad[0] * 4 + $entidad[1] * 8 + $entidad[2] * 5 +
                    $entidad[3] * 10 + $oficina[0] * 9 + $oficina[1] * 7 +
                    $oficina[2] * 3 + $oficina[3] * 6) % 11;

            switch ($resultado) {
                case 10:
                    return 1;
                    break;
                case 11:
                    return 0;
                default:
                    return $resultado;
                    break;
            }
        }

        function comprobarDigitoControl2($cuenta) {
            $aux = explode("-", $cuenta);
            $numCuenta = $aux[3];
            $resultado = 11 - ($numCuenta[0] * 1 + $numCuenta[1] * 2 + $numCuenta[2] * 4 +
                    $numCuenta[3] * 8 + $numCuenta[4] * 5 + $numCuenta[5] * 10 +
                    $numCuenta[6] * 9 + $numCuenta[7] * 7 + $numCuenta[8] * 3 +
                    $numCuenta[9] * 6) % 11;

            switch ($resultado) {
                case 10:
                    return 1;
                    break;
                case 11:
                    return 0;
                default:
                    return $resultado;
                    break;
            };
        }
        ?>
    </body>
</html>
