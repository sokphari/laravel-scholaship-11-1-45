<?php

    // switch(single Expressional){
    //     case 1 :

    //     break;

    //     default :
    //         echo "invalide condition";
    // }
    $date = "mon";
    switch($date){
        case 'thu':{
            echo "today is thu";
            break;
        }
        case 'mon':{
            echo 'today is mon';
            break;
        }
        case 'wed':{
            echo 'today is wed';
            break;
        }
        case 'fri':{
            echo 'today is fri';
            break;
        }
        case 'sun':{
            echo 'today is san';
        }

        default:
        echo 'invalide condition';
        
    }


?>