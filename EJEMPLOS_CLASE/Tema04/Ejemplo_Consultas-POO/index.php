
       <?php
  $lindavista = new mysqli('localhost', 'root', '', 'ejercicio1');
  
  if ($lindavista->connect_errno) {
    echo '<p>Hay error</p>';
    exit();
  }

  $sql1 = "
    SELECT * FROM noticias
      WHERE fecha = CURRENT_DATE
      ORDER BY fecha DESC
      LIMIT 10;
  ";

  $sql2 = "
    INSERT INTO noticias
      VALUES (
          13,
          'Nueva promoción en Nervión',
          '145 viviendas de lujo en urbanización ajardinada situadas en un entorno privilegiado',
          'promociones',
          CURRENT_DATE,
          NULL
      );
  ";

  $sql3 = "
    UPDATE noticias
      SET categoria = 'ofertas'
      WHERE id = 12;
  ";

  $sql4 ='
    DELETE FROM noticias
      WHERE fecha < ADDDATE(CURRENT_DATE, -10);
  ';
?>