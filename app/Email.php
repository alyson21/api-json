<?php


namespace App;


use Faker\Factory as Faker;

class Email
{
    private $endereco;

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco): void
    {
        $this->endereco = $endereco;
    }


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
        $faker = Faker::create();
        return $faker->boolean(45);
    }
}
