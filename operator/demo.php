<?php
    // + - * / %
    $num1 = 20;
    $num2 = 50;
    echo "Num1 + Num2 = ".$num1+$num2."<br>";
    echo "Num1 - Num2 = ".$num1-$num2."<br>";
    echo "Num1 * Num2 = ".$num1*$num2."<br>";
    echo "Num1 / Num2 = ".$num1/$num2."<br>";
    echo "Num1 % Num2 = ".$num1%$num2."<br>";

    //comparison operator
    // <= >= < > ==
    $x = 10; $y = 20;
    echo "Result X < Y = ".($x<$y)."<br>"; //1
    echo "Result X > Y = ".($x>$y)."<br>"; //0
    echo "Result X <=Y = ".($x<=$y)."<br>";//1
    echo "Result X >=Y = ".($x>=$y)."<br>";//0
    echo "Result X ==Y = ".($x==$y)."<br>";//0

    //logical operator
    // && || !
    echo "<br>";
    echo "Result = " . (($x<$y) && ($x>5))."<br>";
    echo "Result = " . (($x!=$y) || ($y<$x))."<br>";

?>