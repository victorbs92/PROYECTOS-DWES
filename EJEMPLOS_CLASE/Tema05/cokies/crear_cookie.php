<?php

// setcookie("nombre","valor que solo puede ser texto", caducidad. ruta. dominio);


// cookie básica

setcookie("micookie", "valor de mi galleta");

// cookie con experación

setcookie("unyear","valor de mi cookie de 365 dias", time()+(60*60*24*365));

 header('Location:ver_cookie.php');
?>


        
        