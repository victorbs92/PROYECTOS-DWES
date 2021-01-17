<?php 
	require_once "producto.php";
	require_once "alimentacion.php ";
	require_once "electronica.php";
 ?>
 <html>
 <head>
 	<title>Productos Tienda</title>
 </head>
 <body>
 	<?php 
		$producto=array(
			new alimentacion("001", "0.99€", "Coliflor","05","2016"),
			new alimentacion("002", "1.50€", "Pistachos","12","2016"),
			new electonica("003", "12€", "Altavoces","2018"),
			new electonica("004", "5.99€", "Cables","2018")
			);
		echo "<h1>TODOS LOS PRODUCTOS</h1>";
		foreach ($producto as $key ) {
			$key->mostrar();
			echo "<hr>";
		}
	 
	 	$sumA=0;
	 	$sum=0;
	 	$sumE=0;

	 	foreach ($producto as $key) {
		 	if($key instanceof alimentacion){	
		 		$sum=$sum+$key->getPrecio();
		 		$sumA=$sumA+$key->getPrecio();
		 	}else{
		 		$sum=$sum+$key->getPrecio();
		 		$sumE=$sumE+$key->getPrecio();
		 	}		 		
	 	}
	 	if ($sumA>$sumE){
	 		$mayor="Alimentacion";
	 	}else{
	 		$mayor="Electronica";
	 	}
	 	echo "<h1>El importe Total es de: ".$sum."</h1><h1>El importe en alimentacion es de: ".$sumA."</h1><h1>El importe en electonica es de: ".$sumE."</h1><h1>Te has gastado mas dinero en el departamento de: ".$mayor." </h1>";
	  ?>

 </body>
 </html>