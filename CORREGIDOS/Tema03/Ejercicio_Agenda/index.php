<?php

function llenar_array() {
    $month = date('Y-n');

    $week = 1;

    for ($i = 1; $i <= date('t', strtotime($month)); $i++) {

        $day_week = date('N', strtotime($month . '-' . $i));

        $calendar[$week][$day_week] = $i;

        if ($day_week == 7)
            $week++;
    }
    return $calendar;
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta type="author" content="">
        <meta charset="UTF-8">
        <title>Agenda</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        <style>body{margin:20px;}</style>
    </head>
    <body>
        <?php $valor = 0; ?>
        <form method="post" action"Agenda.php">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th colspan="7" align='center'><?php echo ucfirst(strftime("%B"));
        echo ' de ';
        echo strftime("%Y"); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Lunes</td>
                                    <td>Martes</td>
                                    <td>Miércoles</td>
                                    <td>Jueves</td>
                                    <td>Viernes</td>
                                    <td>Sábado</td>
                                    <td>Domingo</td>
                                </tr>

                            </tbody>
                            <?php
                            $calendar = llenar_array();
                            foreach ($calendar as $days) :
                                ?>

                                <tr>

                                    <?php
                                    for ($i = 1; $i <= 7; $i++) {
                                        $valor = isset($days[$i]) ? $days[$i] : '';
                                        echo "<td align='center'><input type='submit' value='$valor' name='dia' style='width:100px; height:50px'></td>";
                                    }
                                    ?>

                                </tr>

<?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_POST['dia'])) {
                $valor = $_POST['dia'];
                echo "Comentario: <input type='textarea' name='comentario' size='75' value='dia $valor'>  <br>";
                echo "<input type='submit' value='Guardar' name='guardar' style='width:75px; height:25px' >";
            }
            if (isset($_POST['comentario'])) {

                echo $_POST['comentario'];
            }
            ?>
        </form>

    </body>
</html>