<?php


namespace App;


use Faker\Factory as Faker;

class Email
{
    private $address;



    public function __construct($address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($endereco): void
    {
        $this->address = $endereco;
    }


    public static function filter($string)
    {
        $pattern = '/[a-z0-9_\-\+\.]+@[a-z0-9\-]+\.([a-z]{2,4})(?:\.[a-z]{2})?/i';
        preg_match_all($pattern, $string, $matches);
        return $matches[0];
    }

    public static function sort(&$array)
    {
        sort($array);
        return $array;
    }

    public function send()
    {
        $faker = Faker::create();
        return $faker->boolean(45);
    }
}
