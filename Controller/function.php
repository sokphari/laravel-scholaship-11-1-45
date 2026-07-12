<?php

    #include db here
    include("../config.php");
    if($_SERVER["REQUEST_METHOD"] !== 'POST')
    {
        die("Accept Method POST ONLY");
    }
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
        }else{
            echo "Data Insert Successfully";
        }
    }
?>
