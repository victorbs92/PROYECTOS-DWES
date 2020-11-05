<html><head><title>Resultado de la validacion de mail</title></head>
<body>
<?php
    function VerificarDireccionCorreo($direccion) {
	$Sintaxis='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
	if(preg_match($Sintaxis,$direccion))
	    return true;
	else      return false;
    }

    if(isset($_POST['numero'])){
	
        $direccion=htmlentities($_POST['numero']);
	if(VerificarDireccionCorreo($direccion))
	    echo '<p>Tu direccion es valida.</p>';
	else
	    echo '<p>Tu direcci—n e-mail no es valida.</p>';
	
    }

?>
<br><a href='index.php'>Volver</a> </body></html>