<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestión del funicular</title>
        <link href="css/estilo.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Reserva de asiento</h1>

        <p><img src="icons/Víctor Bartolomé Sivelo - asteriscoRojo.png" alt="alt"/>Campo obligatorio</p>

        <form action="" class="formulario" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text"  name="nombre" required><br>

            <label for="dni">DNI:</label>
            <input type="text"  name="dni" required><br>

            <label for="asiento">Asiento:</label>
            <select name="asiento" id="asiento">
                <?php
                ?>
            </select></br>
            <button type="submit" name="boton"  class="boton">Reservar</button>

            <?php
            ?>       
        </form>

    </body>
</html>