<?php


namespace App\Txt;


use phpDocumentor\Reflection\Types\String_;
use function MongoDB\BSON\toJSON;

class Txt
{
    public static function create($name)
    {
        $file = fopen("$name.txt",'w');
        if ($file == false) die('Erro ao criar o arquivo.');
        return $file;
    }

    public static function read($file)
    {
        $file = $file.".txt";
        $array = array();
        if (file_exists($file)){
            $fo = fopen($file, "r");
            while(!feof($fo))
            {
                $line = fgets($fo);
                if(strpos($line,PHP_EOL)){
                    $line = str_replace(PHP_EOL, null, $line);
                    array_push($array, $line);
                }
                elseif ($line != false)
                    array_push($array, $line);
            }
            fclose($fo);
            return $array;
        }
        return array();
    }

    public static function write($file, $data){
        $array = self::read($file);
        if($array === null)
            $array = array();

        foreach ($data as $item){
            array_push($array, $item);
        }
        $array = array_unique($array);

        $fo = fopen("$file.txt", "w");
        foreach ($array as $item) {
            if($item != "" || $item != null)
                fwrite($fo, $item.PHP_EOL);
        }

        fclose($fo);
    }

}
