<?php

class Cuenta {

    private $numero;
    private $titular;
    private $saldo;

    function __construct($numero, $titular, $saldo) {
        $this->numero = $numero;
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    public function ingreso($cantidad): void {
        $this->saldo = $this->saldo + $cantidad;
    }

    public function reintegro($cantidad): void {
        $this->saldo = $this->saldo - $cantidad;
    }

    public function esPreferencial($cantidad) {
        if ($this->saldo > $cantidad) {
            return true;
        } else {
            return false;
        }
    }

    public function mostrar(): void {
        print "Cuenta: " . $this->numero;
        print "<br>";
        print "Titular: " . $this->titular;
        print "<br>";
        print "Saldo: " . $this->saldo;
    }

}

class CuentaCorriente extends Cuenta {

    private $cuota_mantenimiento;

    function __construct($numero, $titular, $saldo, $cuota_mantenimiento) {
        parent::__construct($numero, $titular, $saldo);
        $this->cuota_mantenimiento = $cuota_mantenimiento;
        $this->saldo = $saldo - $this->cuota_mantenimiento;
    }

    public function reintegro($cantidad): void {
        if ($this->saldo > 20) {
            $this->saldo = $this->saldo - $cantidad;
        } else {
            print "20€ o menos";
        }
    }

    public function mostrar(): void {
        print "Cuenta: " . $this->numero;
        print "<br>";
        print "Titular: " . $this->titular;
        print "<br>";
        print "Saldo: " . $this->saldo;
        print "<br>";
        print "Cuota Mantenimiento: " . $this->cuota_mantenimiento;
    }

}

class CuentaAhorro extends Cuenta {

    private $comision_apertura;
    private $intereses;

    function __construct($numero, $titular, $saldo, $comision_apertura, $intereses) {
        parent::__construct($numero, $titular, $saldo);
        $this->intereses = $intereses;
        $this->comision_apertura = $comision_apertura;
        $this->saldo = $saldo - $this->comision_apertura;
    }

    public function aplicaInteres(): void {
        $this->saldo = $this->saldo * (($this->intereses / 100) + 1);
    }

    public function mostrar(): void {
        print "Cuenta: " . $this->numero;
        print "<br>";
        print "Titular: " . $this->titular;
        print "<br>";
        print "Saldo: " . $this->saldo;
        print "<br>";
        print "Comision apertura: " . $this->comision_apertura;
        print "<br>";
        print "Intereses: " . $this->intereses;
    }

}
