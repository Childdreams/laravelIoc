<?php


namespace App\Controllers;

use baofeng\Demo\Facaders\Facader;
use baofeng\Demo\Https\Request;
use baofeng\Demo\Https\RequestInterface;
use baofeng\Demo\Https\SendSmsInterface;
use baofeng\Demo\Https\SendSmsService;
use baofeng\Demo\Tests\Ts;

class UserController
{
    public function get(RequestInterface $request , SendSmsInterface $sendSms)
    {
        Ts::get();
    }

    public function index(RequestInterface $request)
    {
        foreach ($request as $index => $item) {
            dump("key : " . $index ." value :". $item);
        }
    }
}

