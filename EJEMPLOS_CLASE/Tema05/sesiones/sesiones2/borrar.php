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

session_destroy();

print "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?" . ">\n"; 
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>sesiones</title>
  <link href="estilos1.css" rel="stylesheet" type="text/css" 
  title="Color" />
</head>

<body>
<h1>Borrar datos</h1>

<p>Los datos han sido borrados.</p>

<p><a href="index.php">Volver al inicio.</a></p>


</body>
</html>
