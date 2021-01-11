<?php

class Empleado {

    private $sueldo;

    function __construct($sueldo) {
        $this->sueldo = $sueldo;
    }

    function getSueldo() {
        return $this->sueldo;
    }

}

class Encargado extends Empleado {

    function __construct($sueldo) {
        $this->sueldo = parent::__construct($sueldo) + (15 * parent::__construct($sueldo) / 100);
    }

    function getSueldo() {
        return $this->sueldo;
    }

}
