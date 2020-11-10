
<?php
include_once('templates/header.php');
?>


<?php
$dwes = new mysqli("localhost", "root", "", "funicular");
$dwes->set_charset("utf8");
$error = $dwes->connect_errno;
if ($error != null) 
{
    print "<p>Se ha producido el error: $dwes->connect_error.</p>";
    exit();
}

 else 
 {
    // Comprobamos si tenemos que reservar
    if (isset($_POST['reservar'])) 
    {
        // Preparamos la consulta
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $asiento = (int)($_POST['asiento']);
        //$asiento = filter_input(INPUT_POST, 'asiento', FILTER_VALIDATE_INT);
        
        $todo_bien = true; // Definimos una variable para comprobar la ejecución
        $dwes->autocommit(false);
        
        $consultaUpdate = $dwes->stmt_init();
        $sqlUpdate = "UPDATE plazas SET reservada=1 WHERE numero=?";
        $consultaUpdate->prepare($sqlUpdate);
        $consultaUpdate->bind_param('i', $asiento);
        $consultaUpdate->execute();
        $consultaUpdate->close();
        
        $consultaInsert = $dwes->stmt_init();
        $sqlInsert = "insert into pasajeros values(?,?,'m',?)";
        $consultaInsert->prepare($sqlInsert);
        $consultaInsert->bind_param('ssi', $dni, $nombre, $asiento);
        $consultaInsert->execute();
        $consultaInsert->close();
        
        if ($todo_bien) {
            $dwes->commit();
            $mensaje = "Se reservado el asiento " . $asiento;
        }
        else
        {
            $dwes->rollback();
        }
    }
}
?>


<form class="formulario" action="" method="post" name="formulario">
    
    <ul>
    <li>
         <h2>Reserva de asiento</h2>
         <span class="mensaje_obligatorio">* Campo obligatorio</span>
    </li>
    <li>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" placeholder="Su nombre" required/>
    </li>
    
    <li>
        <label for="dni">DNI:</label>
        <input type="text" name="dni" placeholder="Su DNI" required/>
        <span class="consejo">El formato deberá ser 01234567A</span>
    </li>
    
    
    <li>
        <label for="asiento">Asiento:</label>
        <select name="asiento">
            <?php
            if ($error != null) {
                print "<p>Se ha producido el error: $dwes->connect_error.</p>";
                exit();
            }
            else
            {
                $sql = "SELECT numero, precio FROM plazas WHERE reservada=0";
                $resultado = $dwes->query($sql);
                if ($resultado) 
                {
                    $row = $resultado->fetch_array();
                    while ($row != null) {
                        echo "<option value='${row['numero']}'";
                        // Si se recibió un código de producto lo seleccionamos
                        // en el desplegable usando selected='true'
                        //if (isset($producto) && $producto == $row['cod'])
                        //    echo " selected='true'";
                        echo ">${row['numero']} (${row['precio']}€)</option>";
                        $row = $resultado->fetch_array();
                    }
                    $resultado->close();
                }
            }
            ?>
        </select>
    </li>
    
    <li>
        <button class="submit" type="submit" name="reservar">Reservar</button>
    </li>
</ul>
    
</form>



<?php
include_once('templates/footer.php');
?>
