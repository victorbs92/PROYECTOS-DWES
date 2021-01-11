<?php

abstract class Medico {

    private $nombre;
    private $edad;
    private $turno;

    function __construct($nombre, $edad, $turno) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->turno = $turno;
    }

}

class Familia extends Medico {

    private $num_pacientes;

    function __construct($nombre, $edad, $turno, $num_pacientes) {
        parent::__construct($nombre, $edad, $turno);
        $this->num_pacientes = $num_pacientes;
    }

    public function mostrar(): void {
        print "Nombre: " . $this->nombre;
        print "<br>";
        print "Edad: " . $this->edad;
        print "<br>";
        print "Turno: " . $this->turno;
        print "<br>";
        print "Pacientes: " . $this->num_pacientes;
        print "<br>";
    }

    public function pacientesMedico($objeto, $pacientes) {
        if ($objeto->num_pacientes >= $pacientes) {
            print "Nombre: " . $this->nombre;
            print "<br>";
            print "Edad: " . $this->edad;
            print "<br>";
            print "Turno: " . $this->turno;
            print "<br>";
            print "Pacientes: " . $this->num_pacientes;
            print "<br>";
        }
    }

}

class Urgencia extends Medico {

    private $unidad;

    function __construct($nombre, $edad, $turno, $unidad) {
        parent::__construct($nombre, $edad, $turno);
        $this->unidad = $unidad;
    }

    public function mostrar(): void {
        print "Nombre: " . $this->nombre;
        print "<br>";
        print "Edad: " . $this->edad;
        print "<br>";
        print "Turno: " . $this->turno;
        print "<br>";
        print "Unidad medico: " . $this->unidad;
        print "<br>";
    }

    public function contar($objeto) {
        if ($objeto->edad > 60) {
            return true;
        } else {
            return false;
        }
    }

}
