<?php

require_once("./Encendible.php");

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
class Coche implements Encendible {

    private $gasolina;
    private $bateria;
    private $estado;

    function __construct() {
        $this->gasolina = 0;
        $this->bateria = 10;
        $this->estado = "apagado";
    }

    public function encender() {
        if ($this->gasolina > 0 && $this->bateria > 0 && $this->estado == "apagado") {
            $this->gasolina--;
            $this->bateria--;
            $this->estado = "encendido";
        } else {
            print "Fallo en el arranque.";
        }
    }

    public function apagar() {
        if ($this->estado == "apagado") {
            print ("El coche ya esta apagado");
        } else if ($this->estado == "encendido") {
            $this->estado = "apagado";
        } else {
            print ("Error.");
        }
    }

    function repostar($litros) {
        $this->gasolina = $litros;
    }

    function getGasolina() {
        return $this->gasolina;
    }

    function getBateria() {
        return $this->bateria;
    }

    function getEstado() {
        return $this->estado;
    }

    function setGasolina($gasolina): void {
        $this->gasolina = $gasolina;
    }

    function setBateria($bateria): void {
        $this->bateria = $bateria;
    }

    function setEstado($estado): void {
        $this->estado = $estado;
    }

}
