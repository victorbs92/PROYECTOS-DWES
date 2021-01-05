<!--Confeccionar una clase Empleado, definir como atributos su nombre y sueldo. 
Definir un método inicializar que lleguen como dato el nombre y sueldo. 
Plantear un segundo método que imprima el nombre y un mensaje si debe o no pagar impuestos 
(si el sueldo supera a 3000 paga impuestos)-->


<html>
    <head>
        <title>Pruebas</title>
    </head>
    <body>
        <?php

        class Empleado {

            private $nombre;
            private $sueldo;

            public function inicializar($nom, $sue) {
                $this->nombre = $nom;
                $this->sueldo = $sue;
            }

            public function pagaImpuestos() {
                echo $this->nombre;
                echo '-';
                if ($this->sueldo > 3000)
                    echo 'Debe pagar impuestos';
                else
                    echo 'No paga impuestos';
                echo '<br>';
            }

        }

        $empleado1 = new Empleado();
        $empleado1->inicializar('Luis', 2500);
        $empleado1->pagaImpuestos();
        $empleado1 = new Empleado();
        $empleado1->inicializar('Carla', 4300);
        $empleado1->pagaImpuestos();
        ?>
    </body>
</html>
