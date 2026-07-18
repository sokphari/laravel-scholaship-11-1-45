<?php

    if(!isset($_COOKIE['is_login'])){
        header('Location: ../auth/FormLogin.php');
        exit();
    }
    echo 'Admin = '.$_COOKIE['is_login'];
    echo 'Role = '.$_COOKIE['role'];

?>
<h1>Welcome to dashboard admin</h1>
<a href="../auth/formLogout.php">Logout</a>