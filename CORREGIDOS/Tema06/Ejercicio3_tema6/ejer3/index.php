<?php 
	require_once "medico.php";
	require_once "familia.php";
	require_once "urgencia.php";
 ?>
<html>
<head>
	<title>Medicos</title>
</head>
<body>
	<?php 
		$medico=array(
			new familia("Juan ", 65, "tarde",7),
			new familia("Pepito ", 35, "mañana",4),
			new familia("Loreta ", 45, "tarde",5),
			new urgencia("Andres ", 50, "mañana","enfer"),
			new urgencia("Ray ", 28, "tarde","quir"),
			new urgencia("Grillo ", 67, "mañana","box") 
			);
		echo "<h1>TODOS LOS MEDICOS</h1>";
		foreach ($medico as $key ) {
			$key->mostrar();
			echo "<hr>";
		}
	 ?>
	 <hr>
	 <h1>Medicos mayores de 60 años con turno de tarde</h1>
	 <?php 
	 	foreach ($medico as $key=> $value) {
	 		if($value->getEdad()>60 && $value->getTurno()=="tarde"){
	 			$value->mostrar();
	 		}
	 	}
	  ?>
	  <hr>
	  <hr>
	  <form action="" method="POST" role="form">
	  	<legend>Introduce numero de pacientes</legend>
	  	<input type="int"name="pre"class="form-control">
	  	<button name="cues"type="submit" class="btn btn-primary">Enviar</button>
	  </form>
	  <?php 
	  	if(isset($_POST["pre"]) && isset($_POST["cues"])){
	  		var_dump($_POST);
	  		foreach ($medico as $value) {
		 		if($value instanceof familia && $value->getNum_pacientes()>=$num){
		 			$value->mostrar();	
		 		}
		 		
	 		}
	  	}
	   ?>
	
</body>
</html>