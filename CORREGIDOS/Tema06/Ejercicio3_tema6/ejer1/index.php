<?php 
require_once "empleado.php";
require_once "encargado.php";

$yo=new empleado('Lucia', '700');
echo "empleado: ".$yo->getNombre()." Sueldo:".$yo->getSueldo();
$yo=new encargado('Cristina', '700');
echo "encargado: ".$yo->getNombre()." Sueldo:".$yo->getSueldo();

 ?>