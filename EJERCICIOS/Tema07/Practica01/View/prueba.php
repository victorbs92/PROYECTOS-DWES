<?php
//INCLUDES & REQUIRES
require_once("../Config/ConexionBD.php");


/* SESION */
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $conexionBD = ConexionBD::getInstance();
        $conexionMYSQLI = $conexionBD->connectMYSQLI();
        $conexionBD->disconnect($conexionMYSQLI);
      print("AAA");
        ?>
    </body>
</html>
