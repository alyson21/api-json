<?php


namespace App\Http\Controllers;


use App\Email;
use App\Txt\Txt;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Faker\Factory as Faker;
use Illuminate\Http\Request;


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

        $log = new Logger('default');
        $log->pushHandler(new StreamHandler('logs/sent.log', Logger::INFO));

        $log->warning('Aviso');
        $log->error('Erro');
        $log->info("Info");

        $faker = Faker::create();

        $email = new Email();
        echo $email->send();
    }

    public function store(Request $request){
        Txt::write("emails", Email::filter($request->emails));
        Txt::write("emails_".date('dmYHis'), Email::filter($request->emails) );
        return var_dump($request->emails);
    }

    public function send(Request $request){

    }
}
