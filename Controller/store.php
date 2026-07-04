<?php

    #include db
    include('../config.php');

    #chech http method 
    if(isset($_POST['btnSave'])){
        #declare for store data throw from file create.php
        $fullName = htmlspecialchars($_POST['name']);
        $gender = $_POST['gender'];
        $address = htmlspecialchars($_POST['address']);
        $is_active = $_POST['is_active'];

        #query insert
        $insert = "INSERT INTO `tbcustomer` 
        (`name`,`gender`,`address`,`is_active`)
        values
        ('$fullName','$gender','$address',$is_active)
        ";

        #execute query
        $result = mysqli_query($connection,$insert);
        if($result){
            echo '<script>
                        window.location.href="index.php"
                  </script>';
            exit();
        }else{
            echo 'Insert Fails '.mysqli_error($connection);
        }

    }


?>