<?php

namespace App\Helpers;

/**
 * Helpers to convert unit and another structured values
 */
class UnitHelpers
{
    public static function bytesToSizeString($bytes) : string
    {
        $index = 0;
        $strDic = ['B','Kb','Mb','Gb','Tb'];
        while($bytes >= 1024){
            $index++;
            $bytes = $bytes/1024;
        }

        return number_format($bytes, 2,',','.').$strDic[$index];
    }


}
