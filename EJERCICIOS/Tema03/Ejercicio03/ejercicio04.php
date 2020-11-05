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
         * Crear un array llamado Articulo con los atributos: código, 
         * descripción y existencias.
         * Una función llamada mayor  que proporciona el nombre de artículo con 
         * mayor existencias
         * Una función llamada sumar que permite sumar todas las existencias de 
         * los elementos del array.
         * Un método llamado mostrar que visualiza el contenido del array.
         */
        $articulo = ["codigo" => [1, 2, 3, 4, 5], "descripcion" => ["AAA", "BBB", "CCC", "DDD", "EEE"], "existencias" => [10, 11, 12, 13, 14]];

        mayor($articulo);
        sumar($articulo);
        mostrar($articulo);

        function mayor($array) {
            $mayor = max($array["existencias"]); //obtenemos el mayor de existencias
            $aux;
            for ($i = 0; $i < count($array["existencias"]); $i++) {//recorremos existencias
                if ($array["existencias"][$i] == $mayor) {//obtenemos el indice de existencias donde esta el mayor 
                    $aux = $i; //lo guardamos en $aux para usarlo despues
                }
            }
            print ("<br>" . "El nombre del articulo que tiene mas existencias es: " . $array["descripcion"][$aux] . " con " . $mayor . " unidades.");
        }

        function sumar($array) {
            $resultado = 0;
            for ($i = 0; $i < count($array["existencias"]); $i++) {
                $resultado += $array["existencias"][$i];
            }
            print ("<br>" . "TOTAL: $resultado");
        }

        function mostrar($array) {
            print ("<br>");
            print_r($array);
        }
        ?>
    </body>
</html>
