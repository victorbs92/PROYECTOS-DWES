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
    if (isset($_POST['actualizar'])) 
    {
        $plazas = $_POST['numeroPlaza'];
        $precio = $_POST['precio'];
        $sql = "UPDATE plazas SET precio=? WHERE numero=?";
        $consulta = $dwes->prepare($sql);
// La ejecutamos dentro de un bucle, tantas veces como tiendas haya
        for ($i = 0; $i < count($plazas); $i++) 
        {
            $consulta->bind_param('di', $precio[$i], $plazas[$i]);
            $consulta->execute();
        }
        $consulta->close();
        $mensaje = "Se han actualizado los precios.";
    }
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
            if ($error != null) {
                print "<p>Se ha producido el error: $dwes->connect_error.</p>";
                exit();
            }
            else
            {
                $sql = "SELECT numero, precio FROM plazas";
                $resultado = $dwes->query($sql);
                if ($resultado) 
                {
                    $row = $resultado->fetch_array();
                    while ($row != null) {
                        
                        echo "<input type='hidden' name='numeroPlaza[]' value='${row['numero']}'/>";
                        echo "<p>Plaza ${row['numero']}: ";
                        //El precio va en un cuadro de texto para modificarlo
                        echo "<input type='text' name='precio[]'  ";
                        echo "value='" . $row['precio'] . "' required/> €</p>";
                        
                        
                        $row = $resultado->fetch_array();
                    }
                    $resultado->close();
                }
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



