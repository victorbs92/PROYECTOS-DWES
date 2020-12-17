<!--Confeccionar una clase Persona que tenga como atributos el nombre y la edad. 
Definir como responsabilidades un método que cargue los datos personales y otro que los imprima.
Plantear una segunda clase Empleado que herede de la clase Persona.
Añadir un atributo sueldo y los métodos de cargar el sueldo e imprimir su sueldo.
Definir un objeto de la clase Persona y llamar a sus métodos. 
También crear un objeto de la clase Empleado y llamar a sus métodos.-->

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

            public function imprimirDatosPersonales() {
                echo 'Nombre:' . $this->nombre . '<br>';
                echo 'Edad:' . $this->edad . '<br>';
            }

        }

        class Empleado extends Persona {

            protected $sueldo;

            public function cargarSueldo($su) {
                $this->sueldo = $su;
            }

            public function imprimirSueldo() {
                echo 'Sueldo:' . $this->sueldo . '<br>';
            }

        }

        $persona1 = new Persona();
        $persona1->cargarDatosPersonales('Rodriguez Pablo', 24);
        echo 'Datos personales de la persona:<br>';
        $persona1->imprimirDatosPersonales();
        $empleado1 = New Empleado();
        $empleado1->cargarDatosPersonales('Gonzalez Ana', 32);
        $empleado1->cargarSueldo(2400);
        echo 'Datos personales y sueldo del empleado:<br>';
        $empleado1->imprimirDatosPersonales();
        $empleado1->imprimirSueldo();
        ?>
    </body>
</html>