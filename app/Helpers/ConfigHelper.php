<?php

//app/Helpers/ConfigPageHelper.php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
 
class ConfigHelper {

    public static function getValue($value) {
        return DB::table('configs')->where('variable', $value)->get()->first()->valor;
    }
}