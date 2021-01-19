<?php

class CocheController
{
    var $coches;

    function __construct()
    {
        $this->coches = [
            1 => new Coche("Wolkswagen","Polo","negro","Cristina"),
            2 => new Coche("Toyota","Corolla","verde","Lucia"),
            3 => new Coche("Skoda","Octavia","gris","Sergio"),
            4 => new Coche("Kia","Niro","azul","David")
        ];
    }

    public function index(){

        //Asigno los coches a una variable que estará esperando la vista
        $rowset = $this->coches;


        //Le paso los datos a la vista
        require("vista/index.php");

    }

}
