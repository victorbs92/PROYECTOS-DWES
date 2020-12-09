<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Coche
 *
 * @author admin
 */
class Coche {

    private $matricula;
    private $velocidad;

    function __construct($matricula, $velocidad) {
        $this->matricula = $matricula;
        $this->velocidad = $velocidad;
    }

    function acelera($velocidad): void {
        if ($this->velocidad + $velocidad < 120) {
            $this->velocidad = $this->velocidad + $velocidad;
        }
    }

    function frena($velocidad): void {
        if ($this->velocidad - $velocidad < 0) {
            $this->velocidad = $this->velocidad - $velocidad;
        }
    }

    private function mostrar() {
        print "<p>" . $this->$codigo . "</p>";
    }

}
