<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexion
 *
 * @author admin
 */
class ConexionBD {

    public const URL = 'localhost';
    public const USER = 'root';
    public const PASSWORD = '';
    public const BD = 'blog_db';
    public const DSN = 'mysql:host=localhost;dbname=blog_db';

    static private $instance = null;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new ConexionBD();
        }
        return self::$instance;
    }

    public function connectMYSQLI() {

        $conexion = new mysqli(self::URL, self::USER, self::PASSWORD, self::BD); //("localhost", "usuario", "contraseña", "basedatos")

        return $conexion;
    }

    public function connectPDO() {

        try {
            $conexion = new PDO(self::DSN, self::USER, self::PASSWORD); //("dsn", "usuario", "contraseña")
            return $conexion;
        } catch (PDOException $e) {
            return $e;
        }
    }

}
