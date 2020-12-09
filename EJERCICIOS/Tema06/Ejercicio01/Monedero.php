<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Monedero
 *
 * @author admin
 */
class Monedero {

    private $dinero;
    static $numeroMonederos = 0;

    function __construct($dinero) {
        $this->dinero = $dinero;
        self::$numeroMonederos++;
    }

    public function __destruct() {
        self::$numeroMonerderos--;
    }

    function meterDinero($dinero): void {
        $this->dinero = $this->dinero + $dinero;
    }

    function sacarDinero($dinero): void {
        if ($this->dinero - $dinero >= 0) {
            $this->dinero = $this->dinero - $dinero;
        }
    }

    private function mostrar() {
        print "<p>" . $this->$dinero . "</p>";
    }

}
