<html><head><title>Resultado de la validacion de mail</title></head>
<body>
<?php
    if(isset($_POST['numero'])){
	$email=$_POST['numero'];
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){     
	//La direcci—n de correo es buena
	    echo 'Valido';
        }else echo "Invalido";
	
    }

?>
<br><a href='index.php'>Volver</a> </body></html>