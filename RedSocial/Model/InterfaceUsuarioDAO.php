<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author admin
 */
interface InterfaceUsuarioDAO {

    public function insertarUsuario($usuario);

    public function obtenerUsuario($usuario);
    
    public function obtenerUsuarioPorNick($nick);
    
    public function obtenerIdUsuarioPorNick($nick);

    public function passwordRehash($usuario);
}
