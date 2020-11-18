<?php
ini_set("session.save_handler", "files"); 
session_start();
?>
<html >
<head>
  
  <title>Ver datos. Sesiones. Ejercicios. PHP. </title>
  
</head>

<body>
<h1>Ver datos</h1>
<?php
if (!isset($_SESSION["nombre"]) and !isset($_SESSION["apellidos"])) {
    print "<p>Usted no ha escrito todavía ni su nombre ni sus apellidos</p>";
} elseif (isset($_SESSION["nombre"]) and !isset($_SESSION["apellidos"])) {
  print "<p>Usted sólo ha escrito su nombre: <strong>$_SESSION[nombre]</strong></p>\n";
} elseif (!isset($_SESSION["nombre"]) and isset($_SESSION["apellidos"])) {
  print "<p>Usted sólo ha escrito sus apellidos: <strong>$_SESSION[apellidos]</strong></p>\n";
} else {
  print "<p>Usted ha escrito su nombre: <strong>$_SESSION[nombre]</strong></p>\n";
  print "<p>Usted ha escrito sus apellidos: <strong>$_SESSION[apellidos]</strong></p>\n";
}
print "<p><a href=\"index.php\">Volver al inicio.</a></p>\n";
?>
</body>
</html>
