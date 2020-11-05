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
         * 1.- escriba una sentencia echo o print que permita mostrar por 
         * pantalla el mensaje “Este es el resultado correcto del primer ejercicio”. 
         * Abra un navegador y compruebe el resultado. Si obtiene una página en blanco, 
         * verifique que ha utilizado las etiquetas de apertura y cierre de PHP 
         * correctamente y que la sentencia que ha escrito termina en “;”.
         */
        echo "Este es el resultado correcto del primer ejercicio";
        ?>
        <br>
        <hr>
        <br>
        <?php
        /*
         * 2.- muestre por pantalla el mensaje “Segundo ejercicio: visualización 
         * del contenido de variables”. A continuación, defina dos variables 
         * $nombre y $edad y asígnele un valor correcto. Después, cree una 
         * sentencia que muestre un mensaje que contenga dichas variables similar
         * a “Mi nombre es valor_de_la_ variable_$nombre y mi edad es valor_de_la_variable_$edad”. 
         * inserte un comentario encima de cada variable explicando el significado 
         * del valor que almacenará cada variable.
         */
        echo "Segundo ejercicio: visualización del contenido de variables";
        $nombre = "Víctor"; //Mi nombre
        $edad = 20; // Mi edad
        echo "<br>" . "Mi nombre es $nombre y mi edad es $edad años";
        ?>
        <br>
        <hr>
        <br>
        <?php
        /*
         * 3.- comprobar las capacidades aritméticas de PHP. Para ello, cree 
         * dos variables $operador1 y $operador2. Asígnele los valores 13 y 4, 
         * respectivamente. Defina una tercera variable $resultado y escriba un 
         * código que permita hacer las siguientes operaciones:
         *      13 – 4
         *      13 + 4
         *      13 * 4
         *      13 / 4
         *      13 % 4
         */
        $operador1 = 13;
        $operador2 = 4;
        $resultado;
        echo "<br>" . "13 – 4 = " . ($operador1 - $operador2);
        echo "<br>" . "13 + 4 = " . ($operador1 + $operador2);
        echo "<br>" . "13 * 4 = " . ($operador1 * $operador2);
        echo "<br>" . "13 / 4 = " . ($operador1 / $operador2);
        echo "<br>" . "13 % 4 = " . ($operador1 % $operador2);
        ?>
        <br>
        <hr>
        <br>
        <?php
        /*
         * 4.- conoce toda la información de una variable (utilice la función 
         * var_ dump()), de tal forma que pueda obtener una salida por pantalla 
         * similar a la siguiente:
         *   Información de la variable “nombre”: string (4) “Juan”
         *   Contenido de la variable: Juan
         *   Después de asignarle un valor nulo: NULL
         */
        $nombre = "Juan";
        $aux = var_dump($nombre);
        echo "<br>" . "Informacion de la variable \"nombre\": $aux";
        echo "<br>" . "Contenido de la variable: $nombre";
        $nobmre = null;
        echo "<br>" . "Despues de asignarle un valor nulo: $nombre";
        ?>
        <br>
        <hr>
        <br>
        <?php
        /*
         * 5.- asigne los siguientes valores a una variable $temporal: “Juan”;
         *  3,14; false; 3; null. Muestre por pantalla el tipo que se le asigna 
         * a la variable utilizando la función gettype().
         */
        $temporal = "Juan";
        echo "<br>" . gettype($temporal);
        $temporal = 3.14;
        echo "<br>" . gettype($temporal);
        $temporal = false;
        echo "<br>" . gettype($temporal);
        $temporal = 3;
        echo "<br>" . gettype($temporal);
        $temporal = null;
        echo "<br>" . gettype($temporal);
        ?>
    </body>
</html>
