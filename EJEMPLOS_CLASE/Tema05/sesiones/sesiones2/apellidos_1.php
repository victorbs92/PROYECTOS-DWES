<?php

   if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    else
    {
        session_destroy();
        session_start(); 
    }

print "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?" . ">\n"; 
?>
<!DOCTYPE html >
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>sesiones2</title>
  <link href="estilos1.css" rel="stylesheet" type="text/css" 
  title="Color" />
</head>

<body>
<h1>Apellidos (Formulario 1)</h1>
<?php

if (isset($_SESSION["apellidos"])) {
  print "<p>Usted ya ha escrito que sus apellidos son: <strong>$_SESSION[apellidos]</strong></p>\n";
}
  print "<form action=\"apellidos_2.php\" method=\"get\">
  <fieldset>
    <legend>Formulario</legend>
    <p>Escriba sus apellidos:</p>

    <table cellspacing=\"5\" class=\"borde\">
      <tbody>
        <tr>
          <td><strong>Apellidos:</strong></td>
          <td><input type=\"text\" name=\"apellidos\" size=\"30\" maxlength=\"30\" /></td>
        </tr>
      </tbody>
    </table>

    <p class=\"der\">
    <input type=\"submit\" value=\"Guardar\" /> 
    <input type=\"reset\" value=\"Borrar\" name=\"Reset\" /></p>
  </fieldset>
</form>\n";

print "<p><a href=\"index.php\">Volver al inicio.</a></p>\n";
?>


</body>
</html>
