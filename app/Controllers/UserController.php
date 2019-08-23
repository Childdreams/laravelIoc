<?php


namespace App\Controllers;

use baofeng\Demo\Facaders\Facader;
use baofeng\Demo\Https\RequestInterface;
use baofeng\Demo\Https\SendSmsInterface;
use baofeng\Demo\Https\SendSmsService;

class UserController
{
    public function get(RequestInterface $request , SendSmsInterface $sendSms)
    {
        var_dump(10000);
    }
}

