<?php

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

if (isset($_POST['salir'])) {

    var_dump(session_name());
    print("AAAAA");
    Session::eliminarSesion();
}

include_once '../View/errorView.php';




