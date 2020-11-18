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
<h1>Formulario en tres pasos (Resultado)</h1>
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

$correcto   = recoge("correcto");
$correctoOk = false;

if ($correcto != "Sí" && $correcto != "No") {
    print "<p class=\"aviso\">No ha contestado Sí o No.</p>\n";
} else {
	$correctoOk = true;
}

if ($correctoOk) {
    if ($correcto == "No") {
        print "<p>Su nombre y apellidos <strong>no</strong> son: <strong>$_SESSION[nombre] " 
            ."$_SESSION[apellidos]</strong>.</p>\n";
        print "<p>Vuelva al formulario inicial utilizando el enlace siguiente.</p>\n";
    } else {
        print "<p>Su nombre y apellidos son: <strong>$_SESSION[nombre] " 
            ."$_SESSION[apellidos]</strong>.</p>\n";
        print "<p>Gracias por usar este programa.</p>\n";
    }
}

print "<p><a href=\"index.php\">Volver al formulario.</a></p>\n";
?>

</body>
</html>