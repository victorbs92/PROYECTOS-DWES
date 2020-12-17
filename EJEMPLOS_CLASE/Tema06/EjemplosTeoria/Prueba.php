
<!--Crea una clase Prueba que está formada por un atributo estático llamado contador,
un constructor que visualice el valor del atributo e incrementa su valor, 
un método que permita clonar objetos, en el que se incremente el valor del contador. 
A continuación, crea un objeto y muestra su atributo contador,
posteriormente haz una clonación de este y visualiza su atributo contador.
-->

<?php
print "<B><U>Clonación de objetos </U></B><BR><BR>";

// Definición de la clase Prueba
class Prueba {
 	static $contador = 0;

	function __construct() {
	        print "<BR>entra a construct: " . self::$contador . "<BR>";
                self::$contador++;
	}

	function __clone() {
		print "<BR>entra a clone: " . self::$contador ."<BR>";
                self::$contador++;
	}
	  
}	

 
$objPrueba = new Prueba();


print "Objeto original<BR>";

// el objeto original
print "Contador " . Prueba::$contador . "<BR>";

$CloPrueba = clone $objPrueba;
print "<BR>Objeto clonado<BR>";

// el objeto clonado
print "Contador " . Prueba::$contador . "<BR>";

?>
