<?php 
ini_set("session.save_handler", "files"); 
session_start();

?>
<html >
<head>
    <title>Nombre (Formulario 2). Sesiones. Ejercicios. PHP. </title>
</head>

<body>
<h1>Nombre (Formulario 2)</h1>
<?php

$_SESSION["nombre"] = $_REQUEST["nombre"];
    print "<p>Se ha guardado su nombre: <strong>$_SESSION[nombre]</strong></p>";
    print "<p><a href=\"index.php\">Volver al inicio.</a></p>\n";


?>

</body>
</html>
