<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

/**
 * Description of ArticuloDAO
 * Articulo Data Acces Object
 * @author admin
 */
class ArticuloDAO implements InterfaceArticuloDAO {

    public function obtenerTodosArticulos() {
        /* Accedemos a la BD */
        $conexionBD = ConexionBD::getInstance();
        $conexionMYSQLI = $conexionBD->connectMYSQLI();

        $sqlConsultaProductos = "SELECT * FROM articulo"; //guardamos la consulta sql en una variable

        $resultado = $conexionMYSQLI->query($sqlConsultaProductos); //realizamos la consulta y guardamos el resultado en una variable para retornarlo mas adelante

        $conexionMYSQLI->close(); //cerramos la conexion

        return $resultado;
    }

}
