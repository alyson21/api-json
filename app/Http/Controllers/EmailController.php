<?php


namespace App\Http\Controllers;


use App\Txt\Txt;

class EmailController
{

    public function index(){
        //Txt::create("emails");
        Txt::read("emails");
        Txt::write("emails", array("a@a.com", "b@b.com"));
        return Txt::read("emails");
    }
}
