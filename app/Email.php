<?php


namespace App;


class Email
{
    public static function filter($string){
        $pattern = '/[a-z0-9_\-\+\.]+@[a-z0-9\-]+\.([a-z]{2,4})(?:\.[a-z]{2})?/i';
        preg_match_all($pattern, $string, $matches);
        return $matches[0];
    }

    public static function sort(&$array){
        sort($array);
        return $array;
    }

    public function send(){

    }
}
