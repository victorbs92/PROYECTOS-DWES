<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Estacion Jorge Gregorio Maroto</title>
        <link href="estilo.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Llegada</h1>
        <form action="" method="post" class="formulario">
            <hr>
            <button type="submit" name="boton"  class="boton">llegada</button>
            <hr>
        </form>
        <?php
        if(isset($_POST['boton'])){
        //Creamos el nuevo PDO donde nos conectaremos a la bases de datos
        $estacion = new PDO('mysql:host=localhost;dbname=estacion','root','');
        
        //Definimos la varaible para la comprobación de consultas
        $comprobacion = true;
        
        //Iniciamos la transicción
        $estacion -> beginTransaction();
        //Colocamos la consulta que deseamos realizar
        $consulta = "delete from pasajeros";
        
        //hacemos la comprobación para si no es lo damos true
        
        if($estacion ->exec($consulta)==0) $comprobacion=false;
        
        //Si esta todo guay imprimimos el mensaje correcto y si no imprimos el mensaje falso.
         if ($comprobacion==true){
        $estacion->commit();
            print "<p>Los cambios se han realizado correctamente.</p>";
        }
        else
        {
            $estacion->rollback();
            print "<p>No se han podido realizar los cambios.</p>";
        }

        unset($estacion);
        } 
?>
    </body>
</html>
