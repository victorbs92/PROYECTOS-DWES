<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de usuarios</title>
    </head>
    <body>
        <?php
        //Conexion con la base de datos
        $conexion = new mysqli("localhost", "root", "", "dwes");
        if ($conexion->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
        }
        ?>
        <form action="registro.php" method="POST">          
            <label for="usuario">Nombre:</label><input type="text" name="usuario" id="usuario" required/><br>
            <label for="password1">Contraseña:</label><input type="password" name="password1" id="password1" required/><br>
            <label for="password2">Confirmar Contraseña:</label><input type="password" name="password2" id="password2" required/><br>
            <button type="submit" name="boton">Crear Usuario</button>
        </form>
        <?php
        //Comprueba que el boton ha sido clickado y comprueba que todas las variables han sido declaradas y no están vacias
        if (isset($_POST["boton"])) {
            if (isset($_POST["usuario"]) && !empty($_POST["usuario"]) && isset($_POST["password1"]) && !empty($_POST["password1"]) && isset($_POST["password2"]) && !empty($_POST["password2"])
            ) {
                //Variables del formulario
                $usuario = $_POST["usuario"];
                $password1 = $_POST["password1"];
                $password2 = $_POST["password2"];
                if($password1!=$password2){
                    echo "Las contraseñas no coinciden";
                }else{                    
                 $consulta="INSERT INTO usuarios VALUES(?,?)";
                 $passCifrada= md5($password1);
                 $query=$conexion->prepare($consulta);
                 $query->bind_param('ss', $usuario,$passCifrada);
                 
                 if($query->execute()==false){                    
                     echo "Ha ocurrido un error al ejecutar la consulta";
                 }else{
                     echo "Usuario registrado en la base de datos";
                     $query->close();
                     $conexion->close();
                 }                   
                }               
            } else {
                echo "hay algun campo vacio";
            }
        }
        ?>
    </body>
</html>
