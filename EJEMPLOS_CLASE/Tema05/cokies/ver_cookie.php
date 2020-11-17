<?php

/* 
mostrar el valor de las cookies , tengo que usar $_COOKIE, variable superglobal
 * 
 * es un array asociativo
 */

if(isset($_COOKIE['micookie'])){
    echo "<h1>".$_COOKIE['micookie']."</h1>";
}else{
    echo "no existe la cookie";
}

if(isset($_COOKIE['unyear'])){
    echo "<h1>".$_COOKIE['unyear']."</h1>";
}else{
    echo "no existe la cookie";
}

//herramientas de desarrollador, aplicaciones, localhost

?>
<a href="crear_cookie.php">Crear mis  galletas</a>

<a href="borrar_cookie.php">borrar las galletas</a>