<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Trabajar con bases de datos en PHP -->
<!-- Ejercicio: Transaccio?n con PDO -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejercicio: Transaccio?n con PDO</title>
    </head>

    <body>
<?php
    $dwes=new PDO('mysql:host=localhost;dbname=dwes','dwes2','abc123');

    // Definimos una variable para comprobar la ejecucio?n de las consultas
    $todo_bien=true;
    
    // Iniciamos la transaccio?n
    $dwes->beginTransaction();
    $sql='UPDATE stock SET unidades=1 WHERE producto="PAPYRE62GB" AND tienda=1';
    
    if ($dwes->exec($sql)==0) $todo_bien=false;
    
    $sql='INSERT INTO `stock` (`producto`, `tienda`, `unidades`) VALUES ("PAPYRE62GB", 2, 1)';

    if ($dwes->exec($sql)==0) $todo_bien=false;

    // Si todo fue bien, confirmamos los cambios
    // y en caso contrario los deshacemos

    if ($todo_bien==true){
        $dwes->commit();
        print "<p>Los cambios se han realizado correctamente.</p>";
    }
    else
    {
        $dwes->rollback();
        print "<p>No se han podido realizar los cambios.</p>";
    }
    
    unset($dwes);

?>
    </body>
</html>
