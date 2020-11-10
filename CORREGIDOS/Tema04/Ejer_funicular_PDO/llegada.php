<?php
include_once('templates/header.php');
?>


<?php
include_once('templates/conexion.php');

    if (isset($_POST['llegada'])) 
    {
        $todo_bien = true;  // Definimos una variable para comprobar la ejecución 
        $dwes->beginTransaction();// Iniciamos la transacción

        $sqlUpdate = "UPDATE plazas SET reservada=0";
        $consultaUpdate = $dwes->prepare($sqlUpdate);
        if (!$consultaUpdate->execute()) 
        {
            $todo_bien = false;
        }
        
        $sqlDelete = "delete from pasajeros";
        $consultaDelete = $dwes->prepare($sqlDelete);
        if(!$consultaDelete->execute())
        {
            $todo_bien = false;
        }
        
        // Si todo fue bien, confirmamos los cambios y en caso contrario los deshacemos
        if ($todo_bien == true) {
            $dwes->commit();
            $mensaje= "<p>Los cambios se han hecho correctamente.</p>";
        } else {
            $dwes->rollback();
            $mensaje= "<p>No se han podido realizar los cambios.</p>";
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


