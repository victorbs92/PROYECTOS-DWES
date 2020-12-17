<!--Confeccionar una clase llamada Operacion que defina como atributos $valor1, $valor2, $resultado 
y defina como métodos cargar1 (inicializa el atributo $valor1), cargar2 (inicializa el atributo $valor2)
y por último un método que muestre el contenido de $resultado.
Luego definir dos subclases de la clase Operacion. 
La primera llamada Suma que tiene por objetivo la carga de dos valores, 
sumarlos y mostrar el resultado.
La segunda llamada Resta que tiene por objetivo la carga de dos valores, restarlos 
y mostrar el resultado de la diferencia.-->

<html>
<head>
<title>Pruebas</title>
</head>
<body>
<?php
class Operacion {
  protected $valor1;
  protected $valor2;
  protected $resultado;
  public function cargar1($v)
  {
    $this->valor1=$v;
  }
  public function cargar2($v)
  {
    $this->valor2=$v;
  }
  public function imprimirResultado()
  {
    echo $this->resultado.'<br>';
  }
}

class Suma extends Operacion{
  public function operar()
  {
    $this->resultado=$this->valor1+$this->valor2;
  }
}

class Resta extends Operacion{
  public function operar()
  {
    $this->resultado=$this->valor1-$this->valor2;
  }
}

$suma=new Suma();
$suma->cargar1(10);
$suma->cargar2(10);
$suma->operar();
echo 'El resultado de la suma de 10+10 es:';
$suma->imprimirResultado();
$resta=new Resta();
$resta->cargar1(10);
$resta->cargar2(5);
$resta->operar();
echo 'El resultado de la diferencia de 10-5 es:';
$resta->imprimirResultado();

?>
</body>
</html>
