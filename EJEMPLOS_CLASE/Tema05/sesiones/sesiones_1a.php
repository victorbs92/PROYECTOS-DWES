<?php 


//ini_set("session.save_handler", "files"); 
session_start();

print "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?" . ">\n"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title> Sesiones. </title>
  <link href="estilos1.css" rel="stylesheet" type="text/css" 
  title="Color" />
</head>

<body>
<h1>Formulario en tres pasos (Formulario 2)</h1>
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

$nombre       = recoge("nombre");
$nombrePatron = "/^[[:alpha:]]+( +[[:alpha:]]+)*$/";
$nombreOk     = false;

if (!preg_match($nombrePatron, $nombre)) {
    print "<p class=\"aviso\">No has escrito el nombre únicamente con letras y espacios.</p>\n";
} else {
	$nombreOk = true;
}

if ($nombreOk) {
    $_SESSION["nombre"] = $nombre;
    print "<form action=\"sesiones_1b.php\" method=\"get\">
  <fieldset>
    <legend>Formulario</legend>
    <p>Su nombre es: <strong>$nombre</strong>.</p>
    <p>Escriba sus apellidos:</p>

    <table cellspacing=\"5\" class=\"borde\">
      <tbody>
        <tr>
          <td><strong>Apellidos:</strong></td>
          <td><input type=\"text\" name=\"apellidos\" size=\"30\" maxlength=\"30\" /></td>
        </tr>
      </tbody>
    </table>

    <p class=\"der\">
    <input type=\"submit\" value=\"Seguir\" /> 
    <input type=\"reset\" value=\"Borrar\" name=\"Reset\" /></p>
  </fieldset>
</form>\n";
}

print "<p><a href=\"sesiones_1.html\">Volver al formulario.</a></p>\n";
?>


</body>
</html>
