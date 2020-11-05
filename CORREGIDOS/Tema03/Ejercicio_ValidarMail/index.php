<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Construccio?n de la tabla de multiplicar
        </title>
    </head>
    <body>
        <form method="POST" action="validar_mail.php">VALIDACION CON FILTRO<br>
            Introduzca direccion de correo
            <input type="email" name="numero" size="25"><br>
            <input type="submit" value="Enviar datos" name="enviar">
        </form>
        <form method="POST" action="validar_mail_II.php">UTILIZANDO EXPRESIONES REGULARES<br>
            Introduzca direccion de correo
            <input type="email" name="numero" size="25"><br>
            <input type="submit" value="Enviar datos" name="enviar">
        </form>
    </body>
</html>
