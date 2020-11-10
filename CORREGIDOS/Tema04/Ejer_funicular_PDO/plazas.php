<?php
include_once('templates/header.php');
?>


<?php
    include_once('templates/conexion.php');

    // Comprobamos si tenemos que reservar
    if (isset($_POST['actualizar'])) 
    {
        $plazas = $_POST['numeroPlaza'];
        $precio = $_POST['precio'];
        
        
        $sql = "UPDATE plazas SET precio=? WHERE numero=?";
        $consulta = $dwes->prepare($sql);
        // La ejecutamos dentro de un bucle, tantas veces como plazas haya
        for ($i = 0; $i < count($plazas); $i++) 
        {
            $consulta->bindParam(1, $precio[$i]);
            $consulta->bindParam(2, $plazas[$i]);
            $consulta->execute();
        }
        $mensaje = "Se han actualizado los precios.";
        
    }

?>


<form class="formulario" action="" method="post" name="formulario">
    
    <ul>
    <li>
         <h2>Gestión de plazas</h2>
         <span class="mensaje_obligatorio">* Campo obligatorio</span>
    </li>
    
    
    
    <li>
            <?php
            
                $sql = "SELECT numero, precio FROM plazas";
                $resultado = $dwes->query($sql);
                while ($row = $resultado->fetch()) 
                {
                    echo "<input type='hidden' name='numeroPlaza[]' value='${row['numero']}'/>";
                    echo "<p>Plaza ${row['numero']}: ";
                    //El precio va en un cuadro de texto para modificarlo
                    
                }
            ?>
        
    </li>
    
    <li>
        <button class="submit" type="submit" name="actualizar">Actualizar</button>
    </li>
</ul>
    
</form>



<?php
include_once('templates/footer.php');
?>

