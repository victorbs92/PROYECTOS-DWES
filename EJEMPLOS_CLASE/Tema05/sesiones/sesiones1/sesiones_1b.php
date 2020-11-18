<?php 

ini_set("session.save_handler", "files"); 
session_start();

print "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?" . ">\n"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title> Sesiones. </title>
  <link href="mclibre_php_soluciones.css" rel="stylesheet" type="text/css" 
  title="Color" />
</head>

<body>
<h1>Formulario en tres pasos (Formulario 3)</h1>
<?php

function recoge($var) 
{
    $tmp = (isset($_REQUEST[$var]))
        ? strip_tags(trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "ISO-8859-1"))) 
        : "";
    if (get_magic_quotes_gpc()) {
        $tmp = stripslashes($tmp);
    }
    return $tmp;
}

$apellidos       = recoge("apellidos");
$apellidosPatron = "/^[[:alpha:]]+( +[[:alpha:]]+)*$/";
$apellidosOk     = false;

if (!preg_match($apellidosPatron, $apellidos)) {
    print "<p class=\"aviso\">No ha escrito los apellidos únicamente con letras y espacios.</p>\n";
} else {
	$apellidosOk = true;
}

if ($apellidosOk) {
    $_SESSION["apellidos"] = $apellidos;
    print "<form action=\"sesiones_1c.php\" method=\"get\">
  <fieldset>
    <legend>Formulario</legend>
    <p>Su nombre y apellidos son: <strong>$_SESSION[nombre] $apellidos</strong>.</p>
    <p>¿Es correcto?: <input type=\"submit\" name=\"correcto\" value=\"Sí\" />
      <input type=\"submit\" name=\"correcto\" value=\"No\" /></p>
  </fieldset>
</form>\n";
}

print "<p><a href=\"index.php\">Volver al formulario.</a></p>\n";
?>


</body>
</html>