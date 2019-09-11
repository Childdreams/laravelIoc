<?php


namespace App\Controllers;

use baofeng\Demo\Controller\Controller;
use baofeng\Demo\Https\RequestInterface;
use baofeng\Demo\Https\SendSmsInterface;
use baofeng\Demo\Tests\Ts;

class UserController extends Controller
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
        dd("this is usercontroller index ");
    }
}

