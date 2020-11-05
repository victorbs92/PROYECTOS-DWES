<?php
//Conectamos a la base de datos
$conexion=mysqli_connect('localhost', 'dwes', 'abc123', 'dwes');

//Evitamos que salgan errores por variables vac’as
error_reporting(E_ALL ^ E_NOTICE);

$consulta = "SELECT * FROM stock";
$rs_stock = mysqli_query($conexion, $consulta);
$num_total_registros = mysqli_num_rows($rs_stock);

//Limito la busqueda
$TAMANO_PAGINA = 10;

//examino la p‡gina a mostrar y el inicio del registro a mostrar
$pagina = $_GET["pagina"];
if (!$pagina) {
   $inicio = 0;
   $pagina = 1;
}
else {
   $inicio = ($pagina - 1) * $TAMANO_PAGINA;
}
//calculo el total de p‡ginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

$consulta = "SELECT producto, tienda, unidades FROM stock ORDER BY producto DESC LIMIT ".$inicio."," . $TAMANO_PAGINA;
$rs = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_array($rs)) {
    echo "prueba";
   //Aqui mostrariamos los datos que se quieran sobre el stock
   echo "<p><strong>".$row['producto']." - ".$row['unidades']."</strong> <br>";
}

if ($total_paginas > 1) {
   if ($pagina != 1)
      echo '<a href="'.$url.'?pagina='.($pagina-1).'"><img src="images/izq.gif" border="0"></a>';
      for ($i=1;$i<=$total_paginas;$i++) {
         if ($pagina == $i)
            //si muestro el ’ndice de la p‡gina actual, no coloco enlace
            echo $pagina;
         else
            //si el ’ndice no corresponde con la p‡gina mostrada actualmente,
            //coloco el enlace para ir a esa p‡gina
            echo '  <a href="'.$url.'?pagina='.$i.'">'.$i.'</a>  ';
      }
      if ($pagina != $total_paginas)
         echo '<a href="'.$url.'?pagina='.($pagina+1).'"><img src="images/der.gif" border="0"></a>';
}
?>
<!DOCTYPE HTML>

