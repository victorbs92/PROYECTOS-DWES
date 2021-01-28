<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

/**
 * Description of ProductoLDN
 * Producto Logica De Negocio
 * @author victor
 */
class ProductoLDN {

    function obtenerProductos() {
        $productoDAO = new ProductoDAO();
        $resultadoConsulta = $productoDAO->obtenerTodosProductos(); //se guarda el resultado de la consulta en una variable

        if ($resultadoConsulta !== false) {//si la consulta ha devuelto algo distinto de false
            $arrayResultado = $resultadoConsulta->fetch_all(MYSQLI_BOTH); //el resultado es un array que contiene un array por cada fila devuelta (array de arrays)(matriz) y que es numerico y asociativo

            if (count($arrayResultado) > 0) { //si el arrayResultado es superior a 0 significa que la consulta ha salido bien y ha recibido, al menos, un dato y llama a la funcion cargarArrayProductos de esta misma clase y lo que devuelva esa funcion lo retorna
                return self::cargarArrayProductos($arrayResultado);
            } else {//si la consulta salió bien pero no obtuvo ningun dato, se retorna null
                return null;
            }
        } else {//si la consulta salió mal y devolvió null, se retorna null
            return null;
        }
    }

    function cargarArrayProductos($arrayResultado) {
        $arrayProductos = array();

        for ($i = 0; $i < count($arrayResultado); $i++) { //Recorremos el array resultado, creamos un objeto ProductoVO por cada iteracion y lo añadimos al array de productos
            if ($arrayResultado[$i]['stock'] > 0) {//si el producto tiene stock, crea el productoVO y lo añade al array, asi no se muestran en la tabla los productos sin stock
                $producto = new ProductoVO($arrayResultado[$i][0], $arrayResultado[$i][1], $arrayResultado[$i][2], $arrayResultado[$i][3], $arrayResultado[$i][4]);
                $arrayProductos[$producto->getIdProducto()] = $producto; //guardamos en el arrayProductos el producto siendo el id del producto la posicion del array
            }
        }

        return $arrayProductos;
    }

}
