<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Operacion
 *
 * @author admin
 */
class Operacion {
    
    protected $valor1;
    protected $valor2;
    
    function __construct($valor1, $valor2) {
        $this->valor1 = $valor1;
        $this->valor2 = $valor2;
    }

    
}
