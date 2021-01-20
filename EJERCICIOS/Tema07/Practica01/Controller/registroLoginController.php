<?php

/* INCLUDES Y REQUIRES */
require_once("../Config/ConexionBD.php");



if (isset($_POST['registrar'])) { //código que se ejecuta al pulsar el botón registrar
    print ("AAAAAAAA");
}

if (isset($_POST['login'])) {//código que se ejecuta al pulsar el boton login
    print ("BBBBBBBBBB");
}

include_once '../View/registroLoginView.php'; //incluye la vista para mostrarla en pantalla
