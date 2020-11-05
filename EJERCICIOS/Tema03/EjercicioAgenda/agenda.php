<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agenda</title>
    </head>
    <body>
        <?php
        # definimos los valores iniciales para nuestro calendario
        $mes = date("n");
        $anio = date("Y");
        $diaActual = date("j");

        # Obtenemos el dia de la semana del primer dia
        # Devuelve 0 para domingo, 6 para sabado
        $diaSemana = date("w") + 1;
        # Obtenemos el ultimo dia del mes
        $ultimoDiaMes = date("t");
        ?>
        <form method="post">
            <table border="1" id="calendar">
                <caption>
                    <?php
                    print date("F") . " " . $anio
                    ?>
                </caption>
                <tr>
                    <th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th><th>Vie</th><th>Sab</th><th>Dom</th>
                </tr>
                <tr >
                    <?php
                    $ultimaCelda = $diaSemana + $ultimoDiaMes;
                    // hacemos un bucle hasta 42, que es el máximo de valores que puede
                    // haber... 6 filas de 7 dias
                    for ($i = 1; $i <= 42; $i++) {
                        if ($i == $diaSemana) {
                            // determinamos en que dia empieza
                            $dia = 1;
                        }
                        if ($i < $diaSemana || $i >= $ultimaCelda) {
                            // celda vacia
                            print "<td>&nbsp;</td>";
                        } else {
                            // mostramos el dia
                            print "<td><input type='submit' name='$dia' value='$dia'/></td>";
                            $dia++;
                        }
                        // cuando llega al final de la semana, iniciamos una fila nueva
                        if ($i % 7 == 0) {
                            print "</tr><tr>\n";
                        }
                    }
                    ?>
                </tr>
            </table>
            <input type="submit" name="reinciar" value="reinciar">


        </form>
        <?php

        function testfun() {
            print "Las notas han sido borradas";
            $fp = fopen("datos.txt", "w");

            fputs($fp, "");

            fclose($fp);
        }

        if (isset($_POST['reinciar'])) {
            testfun();
        }
        $fp = fopen("datos.txt", "r");

        while (!feof($fp)) {

            $linea = fgets($fp);

            print $linea . "<br />";
        }

        fclose($fp);

        $month = date("n");
        $year = date("Y");
        for ($i = 1; $i <= 31; $i++) {
            if (isset($_POST[$i])) {
                print "<form method='post' >
                <input type='text' name='texto$i'/>
                    <input type='submit' name='$i' value='enviar'/>
                        <p>Con el primer click guardas, con el segundo envias, también si clickas la segunda vez en el botón se guarda</p>
                    </form>";
                if (isset($_POST["texto$i"])) {
                    $texto = $_POST["texto$i"];
                    if ($texto == "") {
                        break;
                    }
                    $fp = fopen("datos.txt", "a");

                    fputs($fp, "$i de $month del $year Nota: $texto ");
                    fputs($fp, "\n");

                    fclose($fp);
                }
            }
        }
        ?>
    </body>
</html>
