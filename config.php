<?php
    #declare connection
    try{

        $conn = new mysqli("localhost","root","","dbajax",3307);
        // check condition
        // if(!$conn){
        //     echo "Fails Connection".mysqli_errno($conn);
        // }else{
        //     echo "connection successfully";
        // }

    }catch(Exception $e){
        echo ''.$e->getMessage();
    }
?>