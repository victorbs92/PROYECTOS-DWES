<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="index4.php" method="post" >
            <p>Alimentacion</p>
            <label for="producto1">Comprar cerveza:</label>
            <input type="submit" value="Comprar" name="producto1">
            <br>
            <label for="producto2">Comprar vino:</label>
            <input type="submit" value="Comprar" name="producto2">

            <p>Electronica</p>
            <label for="producto3">Comprar pc:</label>
            <input type="submit" value="Comprar" name="producto3">
            <br>
            <label for="producto4">Comprar portatil:</label>
            <input type="submit" value="Comprar" name="producto4">
            <br>
            <input type="submit" value="Mostrar cesta" name="cestalista">
            <input type="submit" value="Vaciar cesta" name="cestavacia">
        </form> 


        <?php
        include("Productos.php");
        session_start();
        if (isset($_SESSION["cesta"])) {
            $producto1 = new Alimentacion(1, 1, "Cerveza", "enero", 2021);
            $producto2 = new Alimentacion(2, 2, "Vino", "febrero", 2022);

            $producto3 = new Electronica(1, 500, "PC", "1 año");
            $producto4 = new Electronica(2, 800, "Portatil", "3 años");

            $arrayProductos = array($producto1, $producto2, $producto3, $producto4);

            //Guardar productos en el array
            for ($a = 1; $a <= 4; $a++) {
                if (isset($_POST["producto" . $a])) {
                    $_SESSION["cesta"][count($_SESSION["cesta"])] = $arrayProductos[$a - 1];
                }
            }

            if (isset($_POST["cestalista"])) {
                //Mostrar datos de los productos dependiendo del tipo que son (alimentacion o electronica) 
                $contadoralimen = 0;
                $contadorelect = 0;
                for ($b = 0; $b < count($_SESSION["cesta"]); $b++) {
                    print "<br>";
                    print "El codigo del producto es: " . $_SESSION["cesta"][$b]->getcodigo();
                    print "<br>";
                    print "El precio del producto es: " . $_SESSION["cesta"][$b]->getprecio();
                    print "<br>";
                    print "El nombre del producto es: " . $_SESSION["cesta"][$b]->getnombre();
                    print "<br>";
                    if ($_SESSION['cesta'][$b] instanceof Alimentacion) {
                        print "El mes de caducidad del producto es: " . $_SESSION["cesta"][$b]->getmesCaducidad();
                        print "<br>";
                        print "El año de caducidad del producto es: " . $_SESSION["cesta"][$b]->getanoCaducidad();
                        $contadoralimen = $_SESSION["cesta"][$b]->getprecio() + $contadoralimen;
                    } else {
                        print "La garantia  del producto es: " . $_SESSION["cesta"][$b]->getgarantia();
                        $contadorelect = $_SESSION["cesta"][$b]->getprecio() + $contadorelect;
                    }
                }
                print"<br>";
                //Gastos en cada tipo de productos
                print "Has gastado en alimentacion :" . $contadoralimen;
                print"<br>";
                print "Has gastado en electronica :" . $contadorelect;
            }


            if (isset($_POST["cestavacia"])) {
                session_unset();
            }
        } else {
            $_SESSION["cesta"] = array();
        }
        ?>
    </body>
</html>
