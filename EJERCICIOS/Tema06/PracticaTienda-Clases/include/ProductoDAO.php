<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("InterfaceProductoDAO.php");
require_once("ProductoVO.php");

/**
 * Description of ProductoDAO
 *
 * @author victor
 */
class ProductoDAO implements InterfaceProductoDAO {

    public function obtenerTodosProductos() {
        //incluimos el acceso a la BD
        include './db_acceso.php';

        //guardamos la consulta sql en una variable
        $sqlConsultaProductos = "SELECT * FROM productos";

        $resultado = $conexion->query($sqlConsultaProductos); //realizamos la consulta y guardamos el resultado en una variable para retornarlo mas adelante

        //$resultadoConsulta->close(); //cerramos la consulta
        $conexion->close(); //cerramos la conexion

        return $resultado;
    }

}
