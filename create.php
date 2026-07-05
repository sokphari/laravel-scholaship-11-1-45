<?php
    #call db
    include('./config.php');
    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        die("Required Only Http method POST");
    }
    try{
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = htmlspecialchars($_POST['name']);
            $gender = htmlspecialchars($_POST['gender']);
            $address = htmlspecialchars($_POST['address']);
            $phone = htmlspecialchars($_POST['phone']);

            #query insert
            $insert = "INSERT INTO register 
            (`name`,`gender`,`address`,`phone`)
            values
            ('$name','$gender','$address','$phone')
            ";
            #execute query
            $re = $conn->query($insert);
            if($re){
                echo "User Create Successfully";
            }else{
                echo "Fails";
            }

        }
    }catch(Exception $e){
        echo ''.$e->getMessage();
    }

?>