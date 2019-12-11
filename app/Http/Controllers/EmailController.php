<?php


namespace App\Http\Controllers;


use App\Email;
use App\Txt\Txt;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class EmailController
{
    public function index(){
//        Txt::create("emails");
//        Txt::read("emails");
//        Txt::write("emails", array("a@a.com", "b@b.com"));
//        return Txt::read("emails");

//        Email::filter("boss@diamonddogs.com
//            link from zelda
//            -- Type your email here --
//            alexkid@sega.com; professorwhite@saymyname.com
//            rh@teknisa.com
//            mario@snes SONIC@SEGA.COM
//            darth@deatchstart.net
//            i don't have email
//            pedro@gmail.com.br");

        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('storage/logs/sent.log', Logger::WARNING));

        $log->warning('Aviso');
        $log->error('Erro');

    }
}
