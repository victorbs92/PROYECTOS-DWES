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

    protected $valor1;
    protected $valor2;

    public function cargar1($valor1): void {
        $this->valor1 = $valor1;
    }

    public function cargar2($valor2): void {
        $this->valor2 = $valor2;
    }

    public function mostrarResultado($resultado) {
        return $this->resultado;
    }

}
