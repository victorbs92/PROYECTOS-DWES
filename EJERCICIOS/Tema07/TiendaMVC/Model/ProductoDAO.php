<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

/*
 * Description of ProductoDAO
 *
 * @author victor
 */

class ProductoDAO implements InterfaceProductoDAO {

    public function obtenerTodosProductos() {
        /* Accedemos a la BD */
        $conexionBD = ConexionBD::getInstance();
        $conexionMYSQLI = $conexionBD->connectMYSQLI();

        $sqlConsultaProductos = "SELECT * FROM productos"; //guardamos la consulta sql en una variable

        $resultado = $conexionMYSQLI->query($sqlConsultaProductos); //realizamos la consulta y guardamos el resultado en una variable para retornarlo mas adelante
        $conexionMYSQLI->close(); //cerramos la conexion

        return $resultado;
    }

    public function actualizarStockTrasPago($arrayCantidades) {//recibe un array de cantidades de productos, los indices serán los id de los productos y los values serán la cantidad que hay que restar al stock actual
        /* Accedemos a la BD */
        $conexionBD = ConexionBD::getInstance();
        $conexionMYSQLI = $conexionBD->connectMYSQLI();

        $consulta = $conexionMYSQLI->prepare("UPDATE productos SET stock=stock-? WHERE idProducto=?"); //preparamos la consulta

        foreach ($arrayCantidades as $key => $value) {//recorremos el array
            $consulta->bind_param("ii", $value, $key); //bindeamos los parametros en cada iteracion del array
            $consulta->execute(); //ejecutamos la consulta
        }

        $consulta->close(); //cerramos la consulta
        $conexionMYSQLI->close();
    }

}
