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
    if (isset($_POST['llegada'])) 
    {
        $todo_bien = true;  // Definimos una variable para comprobar la ejecución 
        $dwes->autocommit(false); // Deshabilitamos el modo transaccional automático

        
        $consultaUpdate = $dwes->stmt_init();
        $sqlUpdate = "UPDATE plazas SET reservada=0";
        $consultaUpdate->prepare($sqlUpdate);
        if (!$consultaUpdate->execute()) 
        {
            $todo_bien = false;
        }
        $consultaUpdate->close();
        
        
        $consultaDelete = $dwes->stmt_init();
        $sqlDelete = "delete from pasajeros";
        $consultaDelete->prepare($sqlDelete);
        if(!$consultaDelete->execute())
        {
            $todo_bien = false;
        }
        $consultaDelete->close();
        
        
        // Si todo fue bien, confirmamos los cambios y en caso contrario los deshacemos
        if ($todo_bien == true) {
            $dwes->commit();
            $mensaje= "<p>Los cambios se han hecho correctamente.</p>";
        } else {
            $dwes->rollback();
            $mensaje= "<p>No se han podido realizar los cambios.</p>";
        }
    }
}
?>


<form class="formulario" action="" method="post" name="formulario">

    <ul>
        <li>
            <h2>Llegada</h2>
        </li>

        <li>
            <button class="submit" type="submit" name="llegada">Llegada</button>
        </li>
    </ul>
    
</form>



<?php
include_once('templates/footer.php');
?>