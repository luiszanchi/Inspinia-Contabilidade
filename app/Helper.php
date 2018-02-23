<?php

namespace App;

use Carbon\Carbon;
use App\Limites;

class Helper
{
    private static function initialize(){

    }
    public static function isMonthDiff($date1, $date2){
        $retorno = $date1->diff($date2, true);
        return ($retorno->y == 0
            &&  $retorno->m == 1
            &&  $retorno->d == 0);
    }


}


?>