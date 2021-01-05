<!--Modificar el ejercicio Persona para que la clase empleado imprima todos los datos del empleado 
(sobreescribir el método imprimir de la clase persona)-->

<html>
    <head>
        <title>Pruebas</title>
    </head>
    <body>
        <?php

        class Persona {

            protected $nombre;
            protected $edad;

            public function cargarDatosPersonales($nom, $ed) {
                $this->nombre = $nom;
                $this->edad = $ed;
            }

            public function imprimir() {
                echo 'Nombre:' . $this->nombre . '<br>';
                echo 'Edad:' . $this->edad . '<br>';
            }

        }

        class Empleado extends Persona {

            protected $sueldo;

            public function cargarSueldo($su) {
                $this->sueldo = $su;
            }

            public function imprimir() {
                parent::imprimir();
                echo 'Sueldo:' . $this->sueldo . '<br>';
            }

        }

        $persona1 = new Persona();
        $persona1->cargarDatosPersonales('Rodriguez Pablo', 24);
        echo 'Datos personales de la persona:<br>';
        $persona1->imprimir();
        $empleado1 = New Empleado();
        $empleado1->cargarDatosPersonales('Gonzalez Ana', 32);
        $empleado1->cargarSueldo(2400);
        echo 'Datos personales y sueldo del empleado:<br>';
        $empleado1->imprimir();
        ?>
    </body>
</html>