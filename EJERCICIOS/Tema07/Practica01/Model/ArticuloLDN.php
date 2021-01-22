<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

/**
 * Description of ArticuloLDN
 * Articulo Logica De Negocio
 * @author victor
 */
class ArticuloLDN {

    function obtenerArticulos() {

        $articuloDAO = new ArticuloDAO();
        $resultadoConsulta = $articuloDAO->obtenerTodosArticulos(); //se guarda el resultado de la consulta en una variable

        if ($resultadoConsulta !== false) {//si la consulta ha devuelto algo distinto de false
            $arrayResultado = $resultadoConsulta->fetch_all(MYSQLI_BOTH); //el resultado es un array que contiene un array por cada fila devuelta (array de arrays)(matriz) y que es numerico y asociativo

            if (count($arrayResultado) > 0) { //si el arrayResultado es superior a 0 significa que la consulta ha salido bien y ha recibido, al menos, un dato y llama a la funcion cargarArrayArticulos de esta misma clase y lo que devuelva esa funcion lo retorna
                return self::cargarArrayArticulos($arrayResultado);
            } else {//si la consulta salió bien pero no obtuvo ningun dato, se retorna null
                return null;
            }
        } else {//si la consulta salió mal y devolvió null, se retorna null
            return null;
        }
    }

    function cargarArrayArticulos($arrayResultado) {
        $arrayArticulos = array();

        for ($i = 0; $i < count($arrayResultado); $i++) { //Recorremos el array resultado, creamos un objeto articuloVO por cada iteracion y lo añadimos al array de articulos
            $articulo = new ArticuloVO($arrayResultado[$i][0], $arrayResultado[$i][1], $arrayResultado[$i][2], $arrayResultado[$i][3]); //creamos un articulo con los datos obtenidos de la consulta a la bd
            $arrayArticulos[$articulo->getIdArticulo()] = $articulo; //guardamos en el arrayArticulos el articulo siendo el id del articulo la posicion del array
        }

        return $arrayArticulos;
    }

}
