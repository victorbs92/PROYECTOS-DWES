<?php

function autocargar_clases($class){
	include 'clases/' . $class . '.php';
}

spl_autoload_register('autocargar_clases');