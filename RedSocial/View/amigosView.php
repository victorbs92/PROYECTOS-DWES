<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>AMIGOS</title>
    </head>
    <body>

        <input type = "submit" name="cerrarSesion" value="Cerrar Sesión" form="amigos">
        <input type = "submit" name="home" value="HOME" form="amigos">


        <form id = "amigos" action = "../Controller/amigosController.php?userSession=<?php print(session_name()) ?>" method = "POST">
            <fieldset>
                <legend>
                    <h1>AMIGOS</h1>
                </legend>

                <input type="text"  id="buscarNombre" maxlength="30" name="buscarNombre" size="30" placeholder="Buscar por nombre de usuario" >
                <input type = "submit" id="botonBuscar" name="botonBuscar" value="Buscar Usuarios" >
                <br>
                <br>
                <?php
                print ($mensaje);
                if ($mensaje == "Usuario encontrado!") {
                    ?>
                    <br>
                    <br>
                    <label>Nick: <?php print($usuarioBuscado) ?> </label>
                    <input type="submit" value='Ver Perfil' name='verPerfil[<?php print($usuarioBuscado) ?>]'>
                    <?php
                    if ($resultado == true) {
                        ?>
                        <input type="submit" value='Elminar de AMIGOS' name='eliminar[<?php print($usuarioBuscado) ?>]'>
                        <?php
                    } else {
                        ?>
                        <input type="submit" value='Añadir a AMIGOS' name='añadir[<?php print($usuarioBuscado) ?>]'>
                        <?php
                    }
                }
                ?>
            </fieldset>

            <fieldset>

                <?php
                if ($arrayAmigos == null) {
                    print ($mensajeSinAmigos);
                } else {
                    ?>
                    <table border = 1 id="tablaAmigos">
                        <tr>
                            <th>Amigo</th>
                            <th>Perfil</th>
                            <th>Eliminar</th>
                        </tr>
                        <?php
                        /* CUERPO DE LA TABLA */
                        foreach ($arrayProductos as $key => $value) {
                            ?>
                            <tr>
                                <?php
                                /* Para acceder a las propiedades del objeto, al ser private nos dara error, pero con el metodo getAllPropierties implementado en la clase
                                  que recibe un objeto de su misma clase y con la funcion get_object_vars obtenemos un array asociativo con todas las propiedades y sus valores... */
                                $propiedadesProducto = $arrayProductos[$key]->getAllPropierties($arrayProductos[$key]);

                                foreach ($propiedadesProducto as $key2 => $value2) {//recorremos las propiedades del objeto para imprimirlas en la tabla
                                    if ($key2 == 'imagen') {
                                        ?>
                                        <th><img border='0' width='100' height='100' src='../img/<?php print($value2) ?>.jpg' ></th>
                                        <?php
                                    } else if ($key2 != 'idProducto') {
                                        ?>
                                        <th><?php print ($value2) ?></th>
                                        <?php
                                    }
                                }

                                $idValue = $arrayProductos[$key]->getIdProducto(); //guardamos en una variable el valor del idProducto
                                ?>

                                <th><input type='submit' value='Añadir' name='añadir[<?php print($idValue) ?>]'></th>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>

                    <?php
                }
                ?>

            </fieldset>

        </form>

    </body>
</html>
