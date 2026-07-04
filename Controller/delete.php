<?php
    include('../config.php'); #call db from file config.php

    #check http method super global 

    if($_SERVER['REQUEST_METHOD'] !== 'GET'){
        die("Required only Http Method GET");
    }

    if(!isset($_GET['cus_id'])){
        die('Customer ID not found');
    }
    if(isset($_GET['cus_id'])){
        $id = $_GET['cus_id'];
        echo 'ID = '.$id;
    }

    #query delete customer from db
    $delete = "DELETE FROM `tbcustomer` WHERE `cus_id` = $id ";
    #execute query
    $result = mysqli_query($connection,$delete);
    #check execute query
    if(!$result){
        echo '<script>alert("Delete Fails")</script>';
    }else{
        echo 'Delete Customer Successfully';
        #window.location.href
        header('Location: index.php?msg=success');
        exit();
    }


?>
