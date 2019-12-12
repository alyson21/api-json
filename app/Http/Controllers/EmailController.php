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

    public function store(Request $request)
    {
        Txt::write("emails", Email::filter($request->emails));
        Txt::write("emails_".date('dmYHis'), Email::filter($request->emails));
        return response()->json([
                json_encode(array('status'=>'Success'))
            ]);
    }

    public function send(Request $request)
    {
        $data = Txt::read("emails");
        $logSucess = new Logger("send");
        $logSucess->pushHandler(new StreamHandler('logs/sent.log', Logger::INFO));
        $logFail = new Logger("fail");
        $logFail->pushHandler(new StreamHandler('logs/fail.log', Logger::ERROR));
        $success = 0;
        $fail = 0;
        $i = 0;
        for ($i ; $i < count($data); $i++)
        {
            $email = new Email($request->subject);
            if($email->send())
            {
                $success++;

                $logSucess->info("Success",array(date('H:i'), $request->subject, $request->body));
            }else{

                $logFail->error("Error sending message",array(date('H:i'), $request->subject, $request->body));
                $fail++;
            }

        }
        return response()->json([
            'emails' => "$i",
            'emails_sent' => "$success",
            'emails_fail' => "$fail"
        ]);
    }
}
