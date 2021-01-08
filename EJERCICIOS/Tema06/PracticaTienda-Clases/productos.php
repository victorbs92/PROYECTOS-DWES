
<?php
//INCLUDES & REQUIRES
require_once("./include/ProductoVO.php");
require_once("./include/ProductoDAO.php");
require_once("./utils/Session.php");

/* SESION */
Session::crearSesion($_GET['userSession']);
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Productos</title>
    </head>
    <body>

        <?php
        if (isset($_SESSION['nombreUsuario'])) {//SI EL USUARIO SI SE HA AUTENTIFICADO CARGA LA PAGINA Y SU CONTENIDO
            ?>

            <input type = "submit" name="cerrarSesion" value="Cerrar Sesión" form="productos">
            <form id = "productos" action = "" method = "post">
                <fieldset>
                    <legend>
                        <h1>PRODUCTOS</h1>
                    </legend>
                    <?php
                    $arrayProductos = array(); //creamos un array numérico donde ir guardando todos los productos

                    $productoDAO = new ProductoDAO();

                    $resultadoConsulta = $productoDAO->obtenerTodosProductos(); //se guarda el resultado de la consulta en una variable

                    $arrayResultado = $resultadoConsulta->fetch_all(MYSQLI_BOTH); //el resultado es un array que contiene un array por cada fila devuelta (array de arrays)(matriz) y que es numerico y asociativo

                    /* Recorremos el array resultado, creamos un objeto ProductoVO por cada iteracion y lo añadimos al array de productos */
                    for ($i = 0; $i < count($arrayResultado); $i++) {
                        $producto = new ProductoVO($arrayResultado[$i][0], $arrayResultado[$i][1], $arrayResultado[$i][2], $arrayResultado[$i][3], $arrayResultado[$i][4]);
                        $arrayProductos[$producto->getIdProducto()] = $producto; //guardamos en el arrayProductos el producto sienda el id del producto la posicion del array
                    }

                    /* CREAMOS LA TABLA */
                    print ("<table border = 1>");
                    print ("<tr>");

                    /* CABECERA DE LA TABLA */
                    foreach ($arrayResultado[0] as $key => $value) {//para conocer las claves solo necesitamos una fila devuelta, en este caso usamos la primera.
                        if (!is_numeric($key) && $key != "idProducto") {//como el array a recorrer es asociativo y numerico al mismo tiempo, impedimos que se imprima la key si es numérica, asi evitamos duplicados
                            print "<th>$key</th>";
                        }
                    }
                    print "<th>Añadir al carrito</th>";
                    print ("</tr>");

                    /* CUERPO DE LA TABLA */
                    foreach ($arrayProductos as $key => $value) {
                        print ("<tr>");

                        /* Para acceder a las propiedades del objeto, al ser private nos dara error, pero con el metodo getAllPropierties implementado en la clase
                          que recibe un objeto de su misma clase y con la funcion get_object_vars obtenemos un array asociativo con todas las propiedades y sus valores... */
                        $propiedadesProducto = $arrayProductos[$key]->getAllPropierties($arrayProductos[$key]);

                        foreach ($propiedadesProducto as $key2 => $value2) {//recorremos las propiedades del objeto para imprimirlas en la tabla
                            if ($key2 == 'imagen') {
                                print "<th><img border='0' width='100' height='100' src='./img/$value2.jpg' ></a></th>";
                            } elseif ($key2 != 'idProducto') {
                                print "<th>$value2</th>";
                            }
                        }

                        $idValue = $arrayProductos[$key]->getIdProducto(); //guardamos en una variable el valor del idProducto

                        print "<th><input type='submit' value='Añadir' name='añadir[$idValue]'></th>"; //el name será un array y su indice será el idValue
                        print ("</tr>");
                    }
                    print "</table>";
                    ?>

                </fieldset>

                <fieldset>
                    <h1>CESTA</h1>

                    <?php
                    $cestaCompra = array(); //creamos un array donde ir guardando los productos añadidos a la cesta

                    if (isset($_POST['añadir'])) { //comprobamos si se ha enviado el formulario habiendo pulsado el boton de añadir
                        $botonAñadirPulsado = array_key_first($_POST['añadir']); //guardamos en una variable la key del array del boton añadir que hemos pulsado

                        array_push($cestaCompra, $producto);
                    } else {
                        print 'Aún no hay nada por aquí';
                    }



//                    if (isset($_POST['añadir'])) { //comprobamos si se ha enviado el formulario habiendo pulsado el boton de añadir
//                        $botonAñadirPulsado = array_key_first($_POST['añadir']); //guardamos en una variable la key del array del boton añadir que hemos pulsado
//                        
//                        if (isset($_SESSION['cesta'])) { //si cesta si que existe en la sesion --> hacemos todo esto para que pueda haber mas de un elemento en la cesta.
//                            $cesta = $_SESSION['cesta']; //creamos una variable llamada cesta donde guardamos el valor de cestaSession
//                            $cesta[] = $arrayProductos[$botonAñadirPulsado]; //añadimos a la variable el nuevo array con los datos del producto que hemos seleccionado al pinchar en el boton añadir
//                            $_SESSION['cesta'] = $cesta; //igualamos la cestaSession con la variable cesta a la que se le acaba de añadir un nuevo producto
//                        } else { //si cesta no existe en la sesion
//                            $cesta[] = $arrayProductos[$botonAñadirPulsado]; //creamos el array cesta y guardamos el producto del boton que hemos pinchado
//                            $_SESSION['cesta'] = $cesta; //creamos cestaSession y guardamos en ella el array anterior
//                        }
//
//                        $totalEuros = 0;
//                        print "<ul>"; //mostramos la cesta en una lista desordenada
//                        for ($index1 = 0; $index1 < count($_SESSION['cesta']); $index1++) {
//                            print "<li>";
//                            print "ID = " . $_SESSION['cesta'][$index1]['idProducto'];
//                            print " --- " . $_SESSION['cesta'][$index1]['nombreProducto'];
//                            print " --- " . $_SESSION['cesta'][$index1]['precio'] . "€";
//                            print "</li>";
//                            $totalEuros += $_SESSION['cesta'][$index1]['precio'];
//                        }
//                        print "</ul>";
//                        print "TOTAL PRODUCTOS EN LA CESTA: " . count($_SESSION['cesta']) . "   IMPORTE: " . $totalEuros . "€";
//                    } else {
//                        print 'Aún no hay nada por aquí';
//                    }

                    $sessionName = session_name(); //guardamos en una variable el nombre de la sesion para poder pasarlo por el GET

                    if (isset($_POST['comprar'])) { //si se ha pulsado el boton comprar
                        if (!empty($_SESSION['cesta'])) { //si cestaSession  no esta vacia
                            header("Location: ./cesta.php?userSession=$sessionName"); //redirigimos a la pg cesta.php
                        }
                    }

                    if (isset($_POST['vaciar'])) { //si se ha pulsado el boton vaciar carrito
                        unset($_SESSION['cesta']); //destruimos cestaSession
                    }
                    /* ----------------------------------------------------- */
                    if (isset($_POST['cerrarSesion'])) { //si se ha pulsado el boton de cerrar sesion
                        header("Location: ./logoff.php?userSession=$sessionName"); //redirigimos a la pg logoff.php
                    }
                    ?>

                    <br><br>
                    <input type = "submit" name = "comprar" value = "Comprar">
                    <input type = "submit" name = "vaciar" value = "Vaciar carrito">
                </fieldset>
            </form>

            <?php
        } else { //SI EL USUARIO NO SE HA AUTENTIFICADO
            print "<h1>ERROR.</h1>";
            print "<a href=registro.php>Login</a></td>";
        }
        ?>

    </body>
</html>