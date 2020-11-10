<?php

$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
try
{
    $dwes = new PDO('mysql:host=localhost;dbname=funicular', 'root', '', $opciones);
    $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $ex)
{
    $mensaje= $ex->getMessage();
}
