<?php


   if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    else
    {
        session_destroy();
        session_start(); 
    }


print "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?" . ">\n"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>sesiones</title>
  <link href="estilos1.css" rel="stylesheet" type="text/css" 
  title="Color" />
</head>

<body>
<h1>Ver datos</h1>
<?php
if (!isset($_SESSION["nombre"]) and !isset($_SESSION["apellidos"])) {
    print "<p>Usted no ha escrito todav�a ni su nombre ni sus apellidos</p>";
} elseif (isset($_SESSION["nombre"]) and !isset($_SESSION["apellidos"])) {
  print "<p>Usted s�lo ha escrito su nombre: <strong>$_SESSION[nombre]</strong></p>\n";
} elseif (!isset($_SESSION["nombre"]) and isset($_SESSION["apellidos"])) {
  print "<p>Usted s�lo ha escrito sus apellidos: <strong>$_SESSION[apellidos]</strong></p>\n";
} else {
  print "<p>Usted ha escrito su nombre: <strong>$_SESSION[nombre]</strong></p>\n";
  print "<p>Usted ha escrito sus apellidos: <strong>$_SESSION[apellidos]</strong></p>\n";
}
print "<p><a href=\"index.php\">Volver al inicio.</a></p>\n";
?>


</html>
