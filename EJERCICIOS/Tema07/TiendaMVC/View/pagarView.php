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

        <form action = "../Controller/pagarController.php?userSession=<?php print(session_name()) ?>" method = "post">

            <?php
            if (isset($_SESSION['cesta']) && isset($_SESSION['unidades'])) {//si las variables de sesion existen es que el usuario todavia no ha pagado, entonces muestra los botones de pagar y volver y todo el codigo correspondiente
                ?>

                <h1> TOTAL A PAGAR:<?php print ($_SESSION['factura']) ?>€ </h1>
                <br>
                <input type = "submit" name = "pagar" value = "Pagar">
                &nbsp;
                <input type = "submit" name = "volver" value = "Volver">

                <?php
            } else {
                ?>
                <h1>GRACIAS POR SU COMPRA</h1>
                <a href=../Controller/productosController.php?userSession=<?php print(session_name()) ?>>Volver a la tienda</a></td>
            <?php
        }
        ?>

    </form>

</body>
</html>
