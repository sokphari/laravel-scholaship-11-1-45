<?php

    # if condition
    // if(condition){
    //     statement;
    // }
    $age = 18;
    if($age >= 18){
        echo "You can relationship 🤗";
    }

    // if elseif condition
    if($age < 18){
        echo "You can not have relationship";
    }else if($age >= 18){
        echo "You can relationship";
    }

    # if elseif else condition
    $x = 100; $y = 200;
    if($x==$y){
        echo "x = y";
    }elseif($x >= $y){
        echo "x != y";
    }else{
        echo "invalidate X and Y";
    }

    // ternary oprator

    $admin = "123456";
    $adminlogin = ($admin == "123456") ? " login successfullt ✅" : "Fails Login 🫷";
    echo $adminlogin;
    // if($admin == "123456"){
        // login successfullt ✅
    // }else{
        // Fails Login 🫷
    // }DD

?>
