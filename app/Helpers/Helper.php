<?php

namespace App\Helpers;
use App\Models\Plan;
use App\Models\User;

class Helper{

    public static function getRandomString($length)
    {
        $chars="qwertyuiopasdfghjklzxcvbnm;,./:<>?QWERTYUIOPASDFGHJKLZXCVBNM1234567890";
        return substr(str_shuffle($chars),0,$length);
    }

}



