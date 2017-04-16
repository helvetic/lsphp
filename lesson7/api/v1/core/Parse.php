<?php


class Parse
{
    public static function request($url)
    {
        $array = explode('/', $url);
    
        $newArray = [
            'table' => $array[1]
        ];

        if ($array[2]) {
            $newArray['id'] = $array[2];
        }
        
        return $newArray;
    }
}
