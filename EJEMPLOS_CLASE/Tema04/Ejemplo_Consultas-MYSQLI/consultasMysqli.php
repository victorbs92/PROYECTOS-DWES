
<?php
$ejercicio1 = new mysqli('localhost', 'root', '', 'ejercicio1');

if ($ejercicio1->connect_errno) {
    echo 'Hay un error';
} else {
    echo 'Estas conectado';
}
?>


Consulta

<HTML LANG="es">

    <HEAD>
        <TITLE>Consultas</TITLE>
        <LINK REL="stylesheet" TYPE="text/css" HREF="estilo.css">

        <?PHP
// Incluir bibliotecas de funciones
        include("db_acceso.php");
        ?>

    </HEAD>

    <BODY>



        <?PHP
        $instruccion = "select * from noticias";
        $consulta = mysqli_query($conect, $instruccion)
                or die("Fallo en la consulta");
        $resultado = mysqli_fetch_array($consulta);

        // Mostrar datos de la noticia i-ésima
        print ("datos selecionados:\n");
        //print ("<UL>\n");
        print ("   <LI>Título: " . $resultado['titulo']);
        print ("   <LI>Texto: " . $resultado['texto']);
        print ("   <LI>Categoría: " . $resultado['categoria']);
        print ("   <LI>Fecha: " . date($resultado['fecha']));
        ?>

    </BODY>
</HTML>