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
abstract class Operacion {

    protected $valor1;
    protected $valor2;
    protected $resultado;

    abstract public function cargar1($valor1);

    abstract protected function cargar2($valor2);

    abstract protected function mostrarResultado($resultado);
}
