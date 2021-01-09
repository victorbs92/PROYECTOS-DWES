
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
                    if (isset($_POST['vaciar'])) { //si se ha pulsado el boton vaciar cesta
                        unset($_SESSION['cesta']); //destruimos cestaSession
                        unset($_SESSION['unidades']); //destruimos unidadesSession
                    }

                    $cestaCompra = array(); //creamos un array donde ir guardando los productos añadidos a la cesta
                    $unidadesProductoCesta = array(); //creamos un array donde los indices serán las claves de los productos y el valor sera la cantidad de ese mismo producto que se ha añadido a la cesta

                    if (isset($_POST['añadir'])) { //comprobamos si se ha enviado el formulario habiendo pulsado el boton de añadir
                        $botonAñadirPulsado = array_key_first($_POST['añadir']); //guardamos en una variable la key del array del boton añadir que hemos pulsado

                        if (isset($_SESSION['cesta'])) { //si cesta si que existe en la sesion --> hacemos todo esto para que pueda haber mas de un elemento en la cesta.
                            $cestaCompra = $_SESSION['cesta']; //igualamos el valor del array cestaCompra con el que hay guardado en la sesion
                            array_push($cestaCompra, $arrayProductos[$botonAñadirPulsado]); //guardamos en el array cestaCompra el producto del arrayProductos que tenga el mismo id que el boton de añadir que se haya pulsado, como no interesa el indice en este array, simplemente lo pusheamos
                            $_SESSION['cesta'] = $cestaCompra; //igualamos la cestaSession con el array cestaCompra al que se le acaba de añadir un nuevo producto
                            $unidadesProductoCesta = $_SESSION['unidades']; //igualamos el valor del array unidades con el que hay guardado en la sesion
                            @$unidadesProductoCesta[$botonAñadirPulsado]++; //incrementamos el valor del array en la posicion del id del producto, se añade el operador de errores para que no marque error al incrementar cuando todavia no habia valor en ese indice
                            $_SESSION['unidades'] = $unidadesProductoCesta; //guardamos en la sesion el valor del array
                        } else { //si cesta no existe en la sesion
                            array_push($cestaCompra, $arrayProductos[$botonAñadirPulsado]); //guardamos en el array cestaCompra el producto del arrayProductos que tenga el mismo id que el boton de añadir que se haya pulsado, como no interesa el indice en este array, simplemente lo pusheamos
                            $_SESSION['cesta'] = $cestaCompra; //creamos cestaSession y guardamos en ella el array anterior
                            @$unidadesProductoCesta[$botonAñadirPulsado]++; //incrementamos el valor del array en la posicion del id del producto, se añade el operador de errores para que no marque error al incrementar cuando todavia no habia valor en ese indice
                            $_SESSION['unidades'] = $unidadesProductoCesta; //guardamos en la sesion el valor del array
                        }

                        pintarCesta($unidadesProductoCesta, $arrayProductos); //se llama a pintarCesta
                    } else if (!isset($_POST['añadir']) && isset($_SESSION['cesta'])) { //si se ha cargado la página sin haber pulsado un boton de añadir y la sesionCesta existe pinta la cesta, esto se ha hecho por si se ha vuelto a la pg desde la pg Cesta o desde la de iniciar sesion sin haber borrado la sesion previamente.
                        $cestaCompra = $_SESSION['cesta']; //igualamos el valor del array cestaCompra con el que hay guardado en la sesion
                        $unidadesProductoCesta = $_SESSION['unidades']; //igualamos el valor del array unidades con el que hay guardado en la sesion

                        pintarCesta($unidadesProductoCesta, $arrayProductos); //se llama a pintarCesta
                    } else {
                        print 'Aún no hay nada por aquí';
                    }

                    function pintarCesta($unidadesProductoCesta, $arrayProductos) {//funcion al que se le pasan los array de unidades y el de array de productos y pinta la cesta en el html
                        /* RESUMEN CESTA */
                        $totalEuros = 0;

                        print "<ul>";
                        foreach ($unidadesProductoCesta as $key => $value) {
                            $costeTodasUdsMismoProducto = $arrayProductos[$key]->getPrecio() * $value;
                            print "<li>";
                            print $arrayProductos[$key]->getNombreProducto() . "  X  " . $value . "  =  " . $costeTodasUdsMismoProducto . " €";
                            print "</li>";
                            $totalEuros = $totalEuros + $arrayProductos[$key]->getPrecio() * $value;
                        }
                        print "</ul>";

                        print "TOTAL PRODUCTOS EN LA CESTA: " . count($_SESSION['cesta']) . " uds";
                        print "<br>IMPORTE TOTAL: " . $totalEuros . "€";
                    }

                    $sessionName = session_name(); //guardamos en una variable el nombre de la sesion para poder pasarlo por el GET

                    if (isset($_POST['cesta'])) { //si se ha pulsado el boton ver cesta
                        if (!empty($_SESSION['cesta'])) { //si cestaSession  no esta vacia permite redirigir a ver cesta
                            header("Location: ./cesta.php?userSession=$sessionName"); //redirigimos a la pg cesta.php
                        }
                    }

                    if (isset($_POST['cerrarSesion'])) { //si se ha pulsado el boton de cerrar sesion
                        header("Location: ./logoff.php?userSession=$sessionName"); //redirigimos a la pg logoff.php
                    }
                    ?>

                    <br><br>
                    <input type = "submit" name = "cesta" value = "Ver cesta">
                    <input type = "submit" name = "vaciar" value = "Vaciar cesta">
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