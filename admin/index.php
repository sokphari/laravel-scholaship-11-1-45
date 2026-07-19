
<?php
    session_start();
    if(!isset($_SESSION['is_login'])){
        header('location: ../auth/FormLogin.php');
    }
    echo "Email : ".$_SESSION['is_login'];

?>

<h1>Bong Admin</h1>
<a href="../auth/FormLogout.php">logout</a>