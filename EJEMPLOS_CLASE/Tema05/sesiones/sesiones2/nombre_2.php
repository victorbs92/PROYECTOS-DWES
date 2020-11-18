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
  <title>sesiones2</title>
  <link href="estilos2.css" rel="stylesheet" type="text/css" 
  title="Color" />
</head>

<body>
<h1>Nombre (Formulario 2)</h1>
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
$nombrePatron = '/^[[:alpha:]]+( +[[:alpha:]]+)*$/';
$nombreOk     = false;

if (!preg_match($nombrePatron, $nombre)) {
    print "<p class=\"aviso\">No ha escrito el nombre únicamente con letras y espacios.</p>\n";
} else {
	$nombreOk = true;
}

if ($nombreOk) {
    $_SESSION["nombre"] = $nombre;
    print "<p>Se ha guardado su nombre: <strong>$_SESSION[nombre]</strong></p>";
    print "<p><a href=\"index.php\">Volver al inicio.</a></p>\n";
} else {
    print "<p><a href=\"nombre_1.php\">Volver al formulario.</a></p>\n";
}

?>


</body>
</html>
