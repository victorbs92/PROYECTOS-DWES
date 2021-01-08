
<?php
//INCLUDES & REQUIRES
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
        <title>Cesta</title>
    </head>
    <body>

        <?php
        if (isset($_SESSION['nombreUsuario'])) {//SI EL USUARIO SI SE HA AUTENTIFICADO CARGA LA PAGINA Y SU CONTENIDO
            ?>
            <form id = "cesta" action = "" method = "post">
                <input type = "submit" name="cerrarSesion" value="Cerrar Sesión" form="cesta">
                <fieldset>
                    <legend>
                        <h1>CESTA</h1>
                    </legend>
                    <?php
                    if (isset($_SESSION['nombreUsuario'])) {//SI EL USUARIO SI SE HA AUTENTIFICADO CARGA LA PAGINA Y SU CONTENIDO
                        $sessionName = session_name(); //guardamos en una variable el nombre de la sesion para poder pasarlo por el GET

                        if (!empty($_SESSION['cesta'])) { //si cestaSession  no esta vacia
                            print ("<table border = 1>"); //creamos la tabla
                            print ("<tr>");

                            //CABECERA DE LA TABLA
                            foreach ($_SESSION['cesta'][0] as $key => $value) {//para conocer las claves solo necesitamos una fila devuelta, en este caso usamos la primera.
                                if ($key != "stock" && $key != "imagen") {
                                    print "<th>$key</th>";
                                }
                            }

                            print ("</tr>");

                            $totalEuros = 0;
                            //CUERPO DE LA TABLA
                            for ($index = 0; $index < count($_SESSION['cesta']); $index++) {//para recorrer una matriz necesitamos bucles anidados
                                print ("<tr>");
                                foreach ($_SESSION['cesta'][$index] as $key => $value) {//para conocer las claves solo necesitamos una fila devuelta, en este caso usamos la primera.
                                    if ($key != "stock" && $key != "imagen") {
                                        print "<td>$value</td>";
                                    }
                                }
                                $totalEuros += $_SESSION['cesta'][$index]['precio'];
                                print ("</tr>");
                            }

                            //PIE DE LA TABLA
                            print ("<tfoot>");
                            print ("<tr>");
                            print ("<td>TOTAL PRODUCTOS: " . count($_SESSION['cesta']) . "</tf>");
                            print ("<td> IMPORTE: " . $totalEuros . "€</tf>");
                            print ("</tr>");
                            print ("</tfoot>");
                            print "</table>";
                            print "<br>";
                        } else {
                            print "<h1>Error en el pedido</h1>";
                            print "<a href = productos.php?userSession=$sessionName>Volver a la tienda</a></td>";
                        }
                    }

                    if (isset($_POST['cerrarSesion'])) {
                        header("Location: ./logoff.php?userSession=$sessionName"); //redirigimos a la pg logoff.php
                    }

                    if (isset($_POST['pagar'])) {
                        header("Location: ./pagar.php?userSession=$sessionName"); //redirigimos a la pg pagar.php
                    }
                    ?>

                    <input type = "submit" name="pagar" value="Pagar">
                </fieldset>
            </form>

            <?php
        } else { //SI EL USUARIO NO SE HA AUTENTIFICADO
            print "<h1>ERROR.</h1>";
            print "<a href = registro.php>Login</a></td>";
        }
        ?>

    </body>
</html>
