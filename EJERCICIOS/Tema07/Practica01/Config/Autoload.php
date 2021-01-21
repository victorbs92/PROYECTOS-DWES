<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

spl_autoload_register(function($className) { //funcion spl_autoload_register que carga una funcion anonima
    $fileName = strtolower($className) . '.php'; //se guarda el nombre de la clase que "llama" a la funcion

    /* primemro comprobamos si la clase existe en la raiz del programa, es decir, sin buscar en los "paquetes/carpeta */
    if (file_exists($fileName)) {//si existe en la raiz hacemos un require_once de su clase
        require_once "$fileName";
    } else {//si no existe importamos la clase PATHS para poder usar su array de paths y recorremos el array de "paquetes/carpetas" buscando si existe en alguna ruta, si termina de recorrer el array y no obtiene ningun resultado, saltará un error
        require_once '../Config/PATHS.php';

        foreach (PATHS::PATHS_ARRAY as $key => $value) {//por cada vuelta del bucle comprobamos la ruta que esta estblecida en el array + el nombre de la clase y si existe lo importamos y salimos del bucle
            if (file_exists($value . $fileName)) {

                require_once ($value . $fileName);
                break;
            }
        }
    }
});

