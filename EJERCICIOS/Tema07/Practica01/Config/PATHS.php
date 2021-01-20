<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PATHS
 *
 * @author victo
 */
class PATHS {
    /*
     * Esta clase haria las veces de archivo de configuracion del proyecto donde se guardan todas las rutas de "paquetes/carpetas"
     * en un array asociativo que es una constante para no poder modificarlo y al que, cuando creemos un nuevo "paquete/carpeta" en el 
     * proyecto, habria que añadir la ruta del nuevo "paquete/carpeta".
     */

    public const PATHS_ARRAY = [
        "pathConfig" => './Config/',
        "pathModel" => './Model/',
        "pathView" => './View/',
        "pathController" => './Controller/'
    ];

}
