<?php
    #include db
    include('config.php');

    #check http method
    if($_SERVER['REQUEST_METHOD'] !== "GET"){
        die("required method GET only");
    }

    try{
        $id = $_GET['id'];
        #query db delete
        $delete = "DELETE FROM `register` WHERE `id` = $id";
        #execute query
        $result = mysqli_query($conn,$delete);
        if($result){
            echo 'delete user id successfully';
        }else{
            echo 'delete not found';
        }
    }catch(Exception $e){
        echo ''.$e->getMessage();
    }
?>
