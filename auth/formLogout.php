<?php
    include('config.php');
    setcookie('is_login','',time()-3600,'/');
    setcookie('role','',time()-3600,'/');

    header('location: FormLogin.php');
?>