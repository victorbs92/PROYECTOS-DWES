<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Estacion Jorge Gregorio Maroto</title>
        <link href="estilo.css" rel="stylesheet" type="text/css">
        <style>
            p:nth-of-type(1){
               color:red;
               float:right;
            }
            input{
                background: url("img/asteriscoRojo.png");
                background-position: right;
                background-repeat: no-repeat;
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <h1>Reserva de asiento</h1>
        
        <p><img src="img/asteriscoRojo.png" alt="alt"/>Campo obligatorio</p>
        
        <form action="" class="formulario" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text"  name="nombre" required><br>
            
            <label for="dni">DNI:</label>
            <input type="text"  name="dni" required><br>
            
            <label for="asiento">Asiento:</label>
            <select name="asiento" id="asiento">
            <?php
            @ $dwes=new mysqli("localhost","root","","estacion"."". "");
            //Usamos como error el connect_errno.
            $error=$dwes->connect_errno;
            if($error==null){
                //guardamos la instruccion sql en una variable
                $sql="SELECT * FROM plazas";
                //ejecutamos la consulta con el query podemos meter la linea 32 y funciona igual
                $resultado=$dwes->query($sql);
                if($resultado){
                    $row= ($resultado->fetch_assoc());
                    while ($row!=null){
                        echo"<option value='${row['numero']}'";
                        echo">Plaza -${row['numero']}- Precio${row['precio']}</option>";
                        $row=$resultado->fetch_assoc();
                        }
                    }
                    $resultado->close();
                }
            else
            {
                $mensaje=$dwes->connect_error;
            }
            
        ?>
            </select></br>
          <button type="submit" name="boton"  class="boton">Reservar</button>
          
    <?php
    if(isset($_POST['asiento'])) $asiento=$_POST['asiento'];
    
    @ $dwes=new mysqli("localhost","root","","estacion"."". "");
    
        // Comprobamos si tenemos que actualizar los valores
        if(isset($_POST['boton']))
        // Preparamos la consulta
        {
            $nombre=$_POST['nombre'];
            $dni=$_POST['dni'];
            
            $sql="insert into pasajeros values ('$dni','$nombre','-','$asiento')";
            $consulta=$dwes->prepare($sql);
            
            // La ejecutamos dentro de un bucle, tantas veces como tiendas haya
          
                $consulta->execute();

            print "Se han actualizado los datos.";
            
            $sql="update plazas set reservada =1 where numero ='$asiento'";
            $consulta=$dwes->prepare($sql);
            
            // La ejecutamos dentro de un bucle, tantas veces como tiendas haya
          
                $consulta->execute();
        }  
    ?>       
        </form>

    </body>
</html>
