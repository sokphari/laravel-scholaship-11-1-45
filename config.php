<?php
    #try and catch we can call handle throw error 
    try{
        $connection = 
        new mysqli("127.0.0.1","root","","inventory",3307);
        // if(!$connection){
        //     echo '<script>alert("Fails connection")</script>';
        // }else{
        //     echo 'Connection successfully 🫡';
        // }
    }catch(Exception $e){
        echo ''.$e->getMessage();
    }
?>
