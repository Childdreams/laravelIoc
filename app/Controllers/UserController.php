<?php


namespace App\Controllers;

use baofeng\Demo\Facaders\Facader;
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
}

