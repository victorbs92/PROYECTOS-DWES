<?php
ini_set("session.save_handler", "files"); 
session_start();
session_destroy();

?>
<html >
<head>
  
  <title>Borrar datos. Sesiones. Ejercicios. PHP. </title>
</head>

<body>
<h1>Borrar datos</h1>

<p>Los datos han sido borrados.</p>

<p><a href="index.php">Volver al inicio.</a></p>

</body>
</html>
