<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/*INCLUDES O AUTOLOAD*/


/**
 * Description of ArticuloDAO
 *
 * @author admin
 */
class ArticuloDAO implements InterfaceArticuloDAO{
    
    public function obtenerTodosArticulos() {
        //incluimos el acceso a la BD
        include './utils/db_acceso.php';

        $sqlConsultaProductos = "SELECT * FROM articulo"; //guardamos la consulta sql en una variable

        $resultado = $conexion->query($sqlConsultaProductos); //realizamos la consulta y guardamos el resultado en una variable para retornarlo mas adelante
        $conexion->close(); //cerramos la conexion

        return $resultado;
    }
    
}
