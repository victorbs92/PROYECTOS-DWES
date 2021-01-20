<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function autocargar_clases($class) {
    require_once 'Model/' . $class . '.php';
}

spl_autoload_register('autocargar_clases');

