<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="index3.php" method="post" >
            <label for="pacientes">Introduce el numero de pacientes:</label><br>
            <input type="number"  name="pacientesNumero"><br>
            <input type="submit" value="Enviar" name="pacientes">
            <input type="submit" value="Mostrar Medicos" name="medicosdatos">
        </form> 
        <?php
        include("Medico.php");

        $medico1 = new Familia("Pepe", 64, "Tarde", 25);
        $medico2 = new Familia("Pablo", 25, "Tarde", 15);
        $medico3 = new Familia("Paco", 61, "Mañana", 20);

        $medico4 = new Urgencia("Maria", 65, "Mañana", 1);
        $medico5 = new Urgencia("Sofia", 25, "Mañana", 2);
        $medico6 = new Urgencia("Marina", 48, "Tarde", 3);

        //Se guardan en un array
        $array = array($medico1, $medico2, $medico3, $medico4, $medico5, $medico6);
        $contador = 0;

        //Contar medicos mayores de 60
        for ($a = 0; $a < count($array); $a++) {
            if ($array[$a] instanceof Urgencia && $array[$a]->contar($array[$a]) == true) {
                $contador++;
            }
        }

        print "Numero de medicos de urgencias en turno de tarde de mas de 60 años: " . $contador;
        print "<br>";
        print "<br>";


        //Mostrar datos de medicos mayores de 60
        if (isset($_POST["medicosdatos"])) {
            for ($b = 0; $b < count($array); $b++) {
                $array[$b]->mostrar();
                print "<br>";
            }
        }

        //Mostrar datos medico dependiendo del numero de pacientes
        if (isset($_POST["pacientes"])) {
            $numeroPacientes = $_POST["pacientesNumero"];
            for ($c = 0; $c < count($array); $c++) {
                if ($array[$c] instanceof Familia) {
                    $array[$c]->pacientesMedico($array[$c], $numeroPacientes);
                    print "<br>";
                }
            }
        }
        ?>
    </body>
</html>
