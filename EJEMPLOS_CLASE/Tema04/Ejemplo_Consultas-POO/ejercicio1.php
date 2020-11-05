<!DOCTYPE html>
<html>
  <head>
    <title>Ejercicio 1</title>
    <meta charset="utf-8" />
  </head>
  <body>
    <?php
      include('index.php');

      // QUERY 1
      $result = $lindavista->query($sql1);

      while ($obj = $result->fetch_object()) {
        print_r($obj);
      }

      // QUERY 2
      $lindavista->query($sql2);
      echo "<p>La consulta 2 ha afectado $lindavista->affected_rows</p>";
      
      // QUERY 3
      $lindavista->query($sql3);
        echo "<p>La consulta 3 ha afectado $lindavista->affected_rows</p>";
      
      // QUERY 4
      $lindavista->query($sql4);
        echo "<p>La consulta 4 ha afectado $lindavista->affected_rows</p>";
      
      $result->close();
    ?>
  </body>
</html>


