<?php
namespace App\Enums;

class SortEnum
{
    public static function sortByDesc($array)
    {
        usort($array, function ($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });

        return $array;
    }

    public static function sortByAsc($array)
    {
        usort($array, function ($a, $b) {
            return strtotime($a['created_at']) - strtotime($b['created_at']);
        });

        return $array;
    }


}
