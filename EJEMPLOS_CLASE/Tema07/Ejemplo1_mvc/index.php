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

//Incluyo los archivos necesarios
require("./modelo/coche.php");
require("./controlador/CocheControlador.php");

//Instancio el controlador
$controller = new CocheController;

//Ejecuto el método
$controller->index();
        ?>
    </body>
</html>
