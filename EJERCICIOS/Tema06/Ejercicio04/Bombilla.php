<?php

require_once("./Encendible.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bombilla
 *
 * @author admin
 */
class Bombilla implements Encendible {

    private $horasDeVida;

    function __construct($horasDeVida) {
        $this->horasDeVida = $horasDeVida;
    }

    public function encender() {
        if ($this->horasDeVida > 0) {
            $this->horasDeVida = $this->horasDeVida - 2;
        }
    }

    public function apagar() {
        print ("Apagada.");
    }

    function getHorasDeVida() {
        return $this->horasDeVida;
    }

    function setHorasDeVida($horasDeVida): void {
        $this->horasDeVida = $horasDeVida;
    }

}
