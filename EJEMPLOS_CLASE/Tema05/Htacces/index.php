<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1>Hola!!</h1>
  <?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Mi dominio"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Texto a enviar si el usuario pulsa el botón Cancelar';
    exit;
} else {
    echo "<p>Hola {$_SERVER['PHP_AUTH_USER']}.</p>";
    echo "<p>Introdujo {$_SERVER['PHP_AUTH_PW']} como su contraseña.</p>";
}
?>
    </body>
</html>
        
