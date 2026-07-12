<?php

    try{
        $config = new mysqli('localhost','root','','auth',3307);
        // if(!$config){
        //     echo "connection not working".mysqli_error($config);
        // }else{
        //     echo "connection successfully";
        // }
    }catch(Exception $e){
        echo ''.$e->getMessage();
    }

?>