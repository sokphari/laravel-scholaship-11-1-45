<?php
    include('config.php');
    $id = $_POST['id'];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        #query update
        $update = "UPDATE `register` SET `name`='$name',`gender`='$gender',
        `address`='$address',`phone`='$phone' WHERE `id`='$id'";
        #execute code
        $result = $conn->query($update);
        if($result){
            echo 'update successfully';
        }else{
            echo 'update user fails';
        }

    }
?>
