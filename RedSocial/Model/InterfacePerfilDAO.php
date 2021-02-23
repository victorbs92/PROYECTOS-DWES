<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author victor
 */
interface InterfacePerfilDAO {

    public function insertarPerfil($perfil);

    public function obtenerPerfilPorIdUsuario($idUsuario);

    public function actualizarPerfil($perfil);
}
