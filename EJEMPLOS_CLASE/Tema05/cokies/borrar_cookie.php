<?php

if($_COOKIE['micookie']){
    unset($_COOKIE['micookie']); // no se borran
    
    setcookie('micookie','',time()-100); //caducar
}
    if($_COOKIE['unyear']){
    unset($_COOKIE['unyear']); // no se borran
    
    setcookie('unyear','',time()-100); //caducar
}

 header('Location:ver_cookie.php');