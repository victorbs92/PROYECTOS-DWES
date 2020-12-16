<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Prueba
 *
 * @author admin
 */
class Prueba {

    static $contador = 0;

    function __construct() {

        self::$contador++;
        print self::$contador;
    }

    public function __clone() {
        self::$contador++;
        print self::$contador;
    }

}

$prueba = new Prueba();

$clon = $prueba->__clone();
