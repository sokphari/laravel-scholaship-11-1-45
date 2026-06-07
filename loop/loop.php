<?php
    //for loop
    $x = 10;
    for($i = 10; $i >= 0; $i--){ //$i = $i + 2
        echo $i."<br>";
    }  


    //while loop
    $a = 100;
    while($a < 1000){
        echo $a."<br>";
        $a+=100;
    }

    //do while loop

    $i = 0;
    do{
        echo "Firs ".$i."<br>";
        $i++;
    }while($i <= 10);


    $arr = [
        'id' => 1,
        'name' => "vinak",
        'gender' => "Male",
        'address' => "BMC"
    ];
    // foreach($collection as $value){
    //     //statement
    // }
    echo "ID = ".$arr['id'] ."Name = ".$arr['name']."<br>";
    foreach($arr as $value){
        echo $value."<br>";
    }

