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
<!DOCTYPE html >
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Sesiones</title>
  <link href="estilos1.css" rel="stylesheet" type="text/css" 
  title="Color" />
</head>

<body>
<h1>Apellidos (Formulario 2)</h1>
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
    print "<p class=\"aviso\">No ha escrito sus apellidos �nicamente con letras y espacios.</p>\n";
} else {
	$apellidosOk = true;
}

if ($apellidosOk) {
    $_SESSION["apellidos"] = $apellidos;
    print "<p>Se han guardado sus apellidos: <strong>$_SESSION[apellidos]</strong></p>";
    print "<p><a href=\"index.php\">Volver al inicio.</a></p>\n";
} else {
    print "<p><a href=\"apellidos_1.php\">Volver al formulario.</a></p>\n";
}

?>


</body>
</html>
