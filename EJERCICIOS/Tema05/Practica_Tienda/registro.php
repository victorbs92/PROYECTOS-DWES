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
        <form id="accesoUsuario" action="productos.php">
            <fieldset>
                <legend>
                    <h1>ACCESO USUARIO</h1>
                </legend>
                <div>
                    <label for="user">User: </label>
                    <input type="text" id="user" name="user" value="" required>
                    <br>
                    <br>
                    <label for="pass">Pass: </label>
                    <input type="password" id="pass" name="pass" value="" required>
                    <br>
                    <br>
                </div>
                <div>
                    <input type="button" id="registrar" name="registrar" value="Registrar">
                    <input type="submit" id="login" name="login" value="Login">
                </div>
            </fieldset>
        </form>
        <?php
        if (isset($_POST['login'])) {
            //incluimos el acceso a la BD
            include './db_acceso.php';
            
        }
        ?>
    </body>
</html>
