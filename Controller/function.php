<?php

    #include db here
    include("../config.php");
    if($_SERVER["REQUEST_METHOD"] !== 'POST')
    {
        die("Accept Method POST ONLY");
    }
    // register logic code 
    if(isset($_POST['btnRegister'])){
        // check validation
        if(empty($_POST['email']) || empty($_POST['password'])){
            return "email and password must be required";
        }

        $username = htmlspecialchars($_POST['username']);
        $gender   = htmlspecialchars($_POST['gender']);
        if(!filter_var(trim($_POST['email']),FILTER_VALIDATE_EMAIL));
        $email  = $_POST['email'];
        $password =  password_hash($_POST['password'],PASSWORD_BCRYPT);
    
        // #query db insert
        $sql = "INSERT INTO `tbcookie` 
        (`username`,`gender`,`email`,`password`)
        values
        ('$username','$gender','$email','$password')";

        #execute query
        $response = mysqli_query($config,$sql);
        if(!$response){
            echo '<script>alert("insert Data not found 📛")</script>';
            header('Location: ../auth/FormLogin');
            exit;
        }else{
            echo "Data Insert Successfully";
        }
    }

    // login logic code 
    if(isset($_POST['btnLogin'])){
        global $config;
        // check codition validation data
        if(empty($_POST['email'])||empty($_POST['password'])){
            return "email and password required";
        }
        if(!filter_var(trim($_POST['email']),FILTER_VALIDATE_EMAIL)){
            die("email required");
        }
        $email = $_POST['email'];
        $password = $_POST['password'];

        $select = "SELECT `email` , `password` , `role` FROM `tbcookie`
        WHERE `email`='$email' AND `password` = '$password'
        ";
        $response = mysqli_query($config,$select);

        $user = $response->fetch_assoc();
        if(password_verify($password,$user['password'])){
            setcookie('is_login',$user['email'],time()+10,'/');
            setcookie('role',$user['role'],time()+10,'/clients');
            if($user['role'] === "admin"){
                header('Location: ../admin/dashboard.php');
                exit;
            }else{
                header('location: ../clients/index.php');
                exit;
            }
        }else{
            header('Location: ../auth/FormLogin.php');
        }

        //60 * 60 = 3600s


    }

?>
