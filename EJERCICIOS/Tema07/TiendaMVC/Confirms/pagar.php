
<?php
//INCLUDES & REQUIRES
require_once("../utils/Session.php");
require_once("../include/ProductoDAO.php");

/* SESION */
Session::crearSesion($_GET['userSession']);
?>

<!DOCTYPE html>
<!--
ESTA PÁGINA HARÁ LAS VECES DE "CONFIRM" YA QUE EN PHP, AL SER UN LENGUAJE DEL LADO DEL SERVIDOR, NO DISPONEMOS DE LA OPCIÓN DE QUE EL USUARIO NOS CONFIRME EN LA PG DE CESTA.
ESTA PÁGINA SOLO CONTENDRÁ EL BOTÓN DE CERRAR SESIÓN DE MANERA PERMANENTE, PAGAR Y VOLVER QUE SERÁN SUSTITUIDOS POR UN ENLACE A LA PG PRODUCTOS SI YA SE HA PAGADO.
TAMBIÉN TENDRÁ LA LÓGICA DEL PROCESO DE PAGO Y LA CONSIGUIENTE ACTUALIZACIÓN DE LOS DATOS EN LA BD.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pagar</title>
    </head>
    <body>

        <?php
        if (isset($_SESSION['nombreUsuario'])) {//SI EL USUARIO SI SE HA AUTENTIFICADO CARGA LA PAGINA Y SU CONTENIDO
            ?>

            <form action = "" method = "post">

                <?php
                $sessionName = session_name(); //guardamos en una variable el nombre de la sesion para poder pasarlo por el GET

                if (isset($_POST['volver'])) {
                    header("Location: ../cesta.php?userSession=$sessionName"); //redirigimos a la pg pagar.php
                }

                if (isset($_POST['pagar'])) {
                    $productoDAO = new ProductoDAO();
                    $productoDAO->actualizarStockTrasPago($_SESSION['unidades']);

                    unset($_SESSION['cesta']); //destruimos cestaSession
                    unset($_SESSION['unidades']); //destruimos unidadesSession
                    unset($_SESSION['productos']); //destruimos productosSession
                    unset($_SESSION['factura']); //destruimos facturaSession
                }

                if (isset($_SESSION['cesta']) && isset($_SESSION['unidades'])) {//si las variables de sesion existen es que el usuario todavia no ha pagado, entonces muestra los botones de pagar y volver y todo el codigo correspondiente
                    //var_dump($_SESSION['unidades']);

                    print "<h1> TOTAL A PAGAR: " . $_SESSION['factura'] . "€";
                    ?>

                    <br>
                    <input type = "submit" name = "pagar" value = "Pagar">
                    &nbsp;
                    <input type = "submit" name = "volver" value = "Volver">

                    <?php
                } else {
                    print "<h1>GRACIAS POR SU COMPRA</h1>";
                    print "<a href=../productos.php?userSession=$sessionName>Volver a la tienda</a></td>";
                }
                ?>





                <!--                //                if (!empty($_SESSION['cesta'])) { //si cestaSession  no esta vacia
                                //                    //incluimos el acceso a la BD
                                //                    include './db_acceso.php';
                                //
                                //                    $cantidadProductos = array(); //array donde se guardara como key el idProducto y como valor el nº de productos de ese mismo id
                                //
                                //                    for ($index = 0; $index < count($_SESSION['cesta']); $index++) { //para recorrer una matriz necesitamos bucles anidados
                                //                        if (array_key_exists($_SESSION['cesta'][$index]['idProducto'], $cantidadProductos)) { //comprueba si el idProducto del array por el que se llega el bucle existe como clave en el array cantidadProductos
                                //                            $cantidadProductos[$_SESSION['cesta'][$index]['idProducto']]++;
                                //                        } else {
                                //                            $cantidadProductos[$_SESSION['cesta'][$index]['idProducto']] = 1;
                                //                        }
                                //                    }
                                //
                                //                    foreach ($cantidadProductos as $key => $value) { //actualiza todo el stock de productos restando los que el usuario ha comprado al total
                                //                        $consultaModificarCantidadStock = "UPDATE productos SET stock = (stock - $value) WHERE idProducto = $key";
                                //                        if ($conexion->query($consultaModificarCantidadStock) != true) {
                                //                            $conexion->rollback();
                                //                        } else {
                                //                            $conexion->commit();
                                //                        }
                                //                    }
                                //                    $conexion->close(); //cerramos la conexion
                                //
                                //                    unset($_SESSION['cesta']); //destruimos sessionCesta
                                //                }-->


            </form>

            <?php
        } else { //SI EL USUARIO NO SE HA AUTENTIFICADO
            print "<h1>ERROR.</h1>";
            print "<a href=registro.php>Login</a></td>";
        }
        ?>

    </body>
</html>
