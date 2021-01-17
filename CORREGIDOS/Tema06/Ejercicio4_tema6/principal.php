<?php 
require_once "coche.php";
require_once "bombilla.php";

function enciende_algo (encendible $algo){
	$algo->encender();
}
function apagar_algo (encendible $algo){
	$algo->apagar();
}

$c1=new coche();
$c2=new coche();
$c1->gasoil(100);
echo "<br>-->coche 1 con gasoil<br>";
enciende_algo($c1);
echo "<br>-->coche 2 sin gasoil<br>";
enciende_algo($c2);

$b1=new bombilla(0);
$b2=new bombilla(1000);
echo "<br>-->Bombilla 1 sin horas de vida<br>";
enciende_algo($b1);
echo "<br>-->Bombilla 2 con 100 horas de vida<br>";
enciende_algo($b2);
echo "<br>-->Apagamos la Bombilla 2 con 100 horas de vida<br>";
apagar_algo($b2);
 ?>