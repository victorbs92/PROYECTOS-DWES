<?php
include_once('templates/header.php');
?>


<?php
include_once('templates/conexion.php');

    // Comprobamos si tenemos que reservar
    if (isset($_POST['reservar'])) 
    {
        // Preparamos la consulta
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $asiento = (int)($_POST['asiento']);
        //$asiento = filter_input(INPUT_POST, 'asiento', FILTER_VALIDATE_INT);
        
        $todo_bien = true; // Definimos una variable para comprobar la ejecución
        $dwes->beginTransaction();// Iniciamos la transacción
        
        
        
        $sqlUpdate = "UPDATE plazas SET reservada=1 WHERE numero=?";
        $consultaUpdate = $dwes->prepare($sqlUpdate);
        $consultaUpdate->bindParam(1, $asiento);
        if (!$consultaUpdate->execute()) 
        {
            $todo_bien = false;
        }
        
        
        
        $sqlInsert = "insert into pasajeros values(?,?,'m',?)";
        $consultaInsert=$dwes->prepare($sqlInsert);
        $consultaInsert->bindParam(1, $dni);
        $consultaInsert->bindParam(2, $nombre);
        $consultaInsert->bindParam(3, $asiento);
        if (!$consultaInsert->execute()) 
        {
            $todo_bien = false;
        }
        
        if ($todo_bien) {
            $dwes->commit();
            $mensaje = "Se reservado el asiento " . $asiento;
        }
        else
        {
            $dwes->rollback();
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
            try
            {
                $sql = "SELECT numero, precio FROM plazas WHERE reservada=0";
                $resultado = $dwes->query($sql);
                
                    while ($row = $resultado->fetch()) {
                        echo "<option value='${row['numero']}'";
                        echo ">${row['numero']} (${row['precio']}€)</option>";
                    }
                    
            }
            catch(PDOException $pdoEx)
            {
                $mensaje = $pdoEx->getMessage();
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

