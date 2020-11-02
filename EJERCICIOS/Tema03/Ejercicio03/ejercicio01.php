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
         * Haz un programa que realice la fusión de dos arrays de 20 números 
         * ordenados. Implementa las funciones: 
         * Cargar: que almacena los datos en el array
         * Ordenar: ordena un array, debes implementar esta función sin utilizar
         * ninguna función de ordenación de php.
         * Mezclar (merge): función a la que se le pasen dos arrays y los mezcle
         * de forma ordenada.
         */
//        $impares = [1, 3, 5, 7, 9, 11, 13, 15, 17, 19, 21, 23, 25, 27, 29, 31, 33, 35, 37, 39];
//        $pares = [2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36, 38, 40];
        $miArray1 = [];
        $miArray2 = [];
        $miArray3 = [];

        cargar($miArray1);
        cargar($miArray2);

        print_r($miArray1);
        print ("<br>");
        print_r($miArray2);
        print ("<br>");

        ordenar($miArray1);
        ordenar($miArray2);

        print_r($miArray1);
        print ("<br>");
        print_r($miArray2);
        print ("<br>");

        $miArray3 = mezclar($miArray1, $miArray2);

        print_r($miArray3);
        print ("<br>");

        function cargar(&$array) {
            for ($i = 0; $i < 20; $i++) {
                $array[$i] = rand(1, 100);
            }
        }

        function ordenar(&$array) {
            for ($i = 1; $i < count($array); $i++) {
                for ($j = 0; $j < count($array) - $i; $j++) {
                    if ($array[$j] > $array[$j + 1]) {
                        $k = $array[$j + 1];
                        $array[$j + 1] = $array[$j];
                        $array[$j] = $k;
                    }
                }
            }
        }

        function mezclar($array1, $array2) {
            $aux = [];
            $aux = array_merge($array1, $array2);
            ordenar($aux);
            return $aux;
        }
        ?>
    </body>
</html>
