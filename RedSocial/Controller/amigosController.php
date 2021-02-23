<?php

/* INCLUDES Y REQUIRES */
require_once("../Config/Autoload.php");

/* SESION */
if (isset($_GET['userSession'])) { //si en el get existe userSession crea/carga una sesion
    Session::crearSesion($_GET['userSession']);
}

if (isset($_SESSION['nickUsuario'])) {//si en la sesion existe la variable nombreUsuario (creada en el login)
    $mensaje = ""; //variable para pintar mensajes en la vista
    $nickUsuarioActual = $_SESSION['nickUsuario']; //se guarda en una variable el nick del usuario actual

    if (isset($_POST['cerrarSesion'])) {//si se ha pulsado el boton cerrarSesion
        header("Location: ../Controller/logOffController.php?userSession=" . session_name()); //redirige al controlador que maneja el logOff
    }

    if (isset($_POST['home'])) {//si se ha pulsado el boton home
        header("Location: ../Controller/homeController.php?userSession=" . session_name()); //redirige al controlador que maneja el home
    }

    if (isset($_POST['botonBuscar'])) {//si se ha pulsado el boton buscarAmigos
        $textoBuscarNombre = $_POST['buscarNombre']; //guardamos en una variable el texto del input pasado por el POST
        $usuarioBuscado = UsuarioLDN::obtenerUsuarios($textoBuscarNombre); //llamamos a actualizarPerfil pasandole el nickUsuario para buscara traves de él, el id del usuario en la bd, y una vez conseguido el idUsuario, utilizarlo para obtener su perfil y poder actualizar los datos

        if ($usuarioBuscado == false) {
            $mensaje = "Usuario no encontrado";
        } else {
            $mensaje = "Usuario encontrado!";
            $resultado = AmigosLDN::comprobarSiEsAmigo($nickUsuarioActual, $textoBuscarNombre); //comprobamos si el usuarioEncontrado es amigo o no
            var_dump($resultado);
           
        }
    }

    if (isset($_POST['verPerfil'])) {//si se ha pulsado el boton verPerfil
        $botonPulsado_nickUsuarioEncontrado = array_key_first($_POST['verPerfil']); //guardamos en una variable la key del array del boton verPerfil que hemos pulsado
        $_SESSION['nickUsuarioEncontrado'] = $botonPulsado_nickUsuarioEncontrado; //guardamos en la session el valor del botonPulsado que es el mismo valor que el nick del usuario encontrado
        header("Location: ../Controller/verPerfilController.php?userSession=" . session_name()); //redirige al controlador que maneja el verPerfil
    }

    if (isset($_POST['añadir'])) {//si se ha pulsado el boton añadir
        $botonPulsado_nickUsuarioEncontrado = array_key_first($_POST['añadir']); //guardamos en una variable la key del array del boton añadir que hemos pulsado que es igual al nick del usuario encontrado

        $resultado = AmigosLDN::añadirAmigo($nickUsuarioActual, $botonPulsado_nickUsuarioEncontrado); //guardamos en una variable el resultado de llamar a añadirAmigo de la clase AmigoslLDN, que devolvera true si se añadio el amigo con exito o false si dio error

        if ($resultado == true) {//si el resultado es true
            $mensaje = "Usuario añadido a amigos!";
        } else {//si el resultado es false
            $mensaje = "Error, no se ha podido añadir el usuario a la lista de amigos.";
        }
    }

    include_once '../View/amigosView.php'; //incluye la vista para mostrarla en pantalla
} else { //si en la sesion no existe la variable nombreUsuario (creada en el login) significa que se ha intentado acceder sin haber pasado por el login
    if (isset($_SESSION)) { //si existe una sesion significa que se ha intentado acceder escribiendo la url con un parametro en el get, asi que se borra esa sesion por temas de seguridad
        Session::eliminarSesion();
    }
    header("Location: ../Controller/errorController.php"); //redirige al controlador que maneja los errores
}