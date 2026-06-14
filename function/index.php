<?php

#function non return
#non paramater
function student(){
    echo "Hello Student Welcome to etec";
}
student();
echo '<br>';
student();
echo '<br>';
#with parameter
function students($name,$age){
    echo 'My name is : '.$name.'<br>';
    echo "age :".$age." years old"; 
}
students("chhaikoung",20);


#function return 
#non parameter

function sum(){
    $x = 100;
    $y = 100;
    
    return $Sum = $x + $y ;
}
echo '<br>';
echo "Result function return = ".sum();
echo "After Calculator = ".sum() + 300;

function mul($hour,$salary){
    $mul = $hour * $salary;
    return $mul;
}
echo '<br>';
echo 'result with function return'.mul(12,300).'<br>';
echo 'result after modify = '.mul(12,300) + 20;










?>