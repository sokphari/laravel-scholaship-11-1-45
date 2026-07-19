<?php
    #include db
    include('../config.php');

    session_start();

    if(isset($_POST['btnRegister'])){
        $name = htmlspecialchars($_POST['name']);
        $gender = htmlspecialchars($_POST['gender']);
        $email = $_POST['email'];
        $password =  $_POST['password'];


        #query db
        $sql = "INSERT INTO `tb_session` (`name`,`gender`,`email`,`password`)
        values
        ('$name','$gender','$email','$password') 
        ";

        #execute query
        $result = $conn->query($sql);
        if($result){
            header('location: ../auth/Formlogin.php');
            exit;
        }



    }
    #login
    if(isset($_POST['btnLogin'])){

        global $conn;

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT `email` , `password` , `role`
        FROM `tb_session` WHERE `email` = '$email' AND `password`='$password'
        ";

        #ex
        $result = $conn->query($sql);
        if(mysqli_num_rows($result) > 0){
            $user = $result->fetch_assoc();
            // $_SESSION['key'] = value
            $_SESSION['is_login'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            if($user['role'] != 0){
                header('location: ../admin/index.php');
                exit;
            }else{
                header('location: ../clients/index.php');
                exit;
            }
            
        }else{
            header('location: ../auth/FormLogin.php');
            
        }

    }

?>