<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Trabajar con bases de datos en PHP -->
<!-- Ejemplo: Conjuntos de datos con MySQLi -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Consultas preparadas en PDO</title>
        <link href="dwes.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>
<?php
    if(isset($_POST['producto'])) $producto=$_POST['producto'];
    
    @ $dwes=new PDO ("mysql:host=localhost;dbname=dwes","root","admin");
    
        // Comprobamos si tenemos que actualizar los valores
        if(isset($_POST['actualiz']))
        // Preparamos la consulta
        {
            $tienda=$_POST['tienda'];
            $unidades=$_POST['unidades'];
            
            $sql="UPDATE stock SET unidades=:unidades WHERE tienda=:tienda AND producto='$producto'";
            $consulta=$dwes->prepare($sql);
            
            // La ejecutamos dentro de un bucle, tantas veces como tiendas haya
            for($i=0;$i<count($tienda);$i++){
                $consulta->bindParam(":unidades",$unidades[$i]);
                $consulta->bindParam(":tienda",$tienda[$i]);
                $consulta->execute();
            }

            $mensaje="Se han actualizado los datos.";
        }
    
?>
        <div id="encabezado">
        <h1>Consultas preparadas en PDO</h1>
        <form id="form_seleccion" action="ejercicio6.php" method="post">
            <span>Producto: </span>
            <select name="producto">
<?php
    // Rellenamos el desplegable con los datos de todos los productos
 
    
        $sql="SELECT cod, nombre_corto FROM producto";
        $resultado=$dwes->query($sql);
        if($resultado){
            $row= ($resultado->fetch());
            while ($row!=null){
                echo"<option value='${row['cod']}'";
                // Si se recibio? un co?digo de producto lo seleccionamos
                // en el desplegable usando selected='true'
                if(isset($producto) && ($producto==$row['cod']))
                    echo " selected='true'";
                echo">${row['nombre_corto']}</option>";
                $row=$resultado->fetch();
            }
        }
    
?>
            </select>
            <input type="submit" value="Mostrar stock" name="enviar"/>
        </form>
        </div>
        
        <div id="contenido">
            <h2>Stock del producto en las tiendas:</h2>
<?php
// Si se recibio un co?digo de producto y no se produjo ningu?n error
// mostramos el stock de ese producto en las distintas tiendas
   if (isset($producto))
    {
        $sql="SELECT tienda.cod, tienda.nombre FROM tienda INNER JOIN stock ON tienda.cod=stock.tienda WHERE stock.producto='$producto'";  
        $resultado = $dwes->query($sql);
        if ($resultado){
            echo '<form id="form_actualiz" action="ejercicio11.php" method="post">';
            $row=$resultado->fetch();
            while ($row!=null){
                // Metemos ocultos el co?digo de producto y los de las tiendas
                echo "<input type='hidden' name='producto' value='$producto'/>";
                echo "<input type='hidden' name='tienda[]' value='".$row['cod']."'/>";
                echo "<p>Tienda${row['nombre']}:";
                // El nu?mero de unidades ahora va en un cuadro de texto
                echo "<input type='text' name='unidades[]' size='4' ";
                echo "value='".$row['unidades']."'/> unidades.</p>";
                $row=$resultado->fetch();
            }
            echo"<input type='submit' value='Actualizar' name='actualiz'/>";
            echo "</form>";
        }
    }
    
?>
        </div>
        <div id="pie">
<?php
    unset($dwes);
?>


        </div>

    </body>
</html>