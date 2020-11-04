<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Trabajar con bases de datos en PHP -->
<!-- Ejercicio: Transaccio?n con MySQLi -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejercicio: Transaccio?n con MySQLi</title>
    </head>
    <body>
<?php
    @ $dwes=new mysqli("localhost","root","admin","dwes");
    $error = $dwes->connect_errno;
    if ($error!=null){
        print"<p>Se ha producido el error: $dwes->connect_error.</p>";
        exit();
    }
    // Definimos una variable para comprobar la ejecucio?n de las consultas
    $todo_bien=true;
    // Iniciamos la transaccio?n
    $dwes->autocommit(false);
    $sql='UPDATE stock SET unidades=1 WHERE producto="3DSNG" AND tienda=1';
    if($dwes->query($sql)!=true) $todo_bien=false;

    $sql='INSERT INTO `stock` (`producto`, `tienda`, `unidades`) VALUES ("3DSNG", 3,1)';

    if($dwes->query($sql)!=true) $todo_bien=false;

    // Si todo fue bien, confirmamos los cambios
    // y en caso contrario los deshacemos
    if ($todo_bien==true){
        $dwes->commit();
        print "<p>Los cambios se han realizado correctamente.</p>";
    }
    else
    {
        $dwes->rollback();
        print"<p>No se han podido realizar los cambios.</p>";
    }
    
    $dwes->close();

?>
    </body>
</html>
