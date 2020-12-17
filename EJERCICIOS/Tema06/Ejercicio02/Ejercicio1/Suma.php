<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Suma
 *
 * @author admin
 */
class Suma extends Operacion {

    protected $titulo;

    function __construct($valor1, $valor2, $titulo) {
        parent::__construct($valor1, $valor2);
        $this->titulo = $titulo;
    }

}
