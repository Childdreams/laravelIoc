<?php


namespace baofeng\Demo\Tests;


use baofeng\Demo\Facaders\Facader;

class Ts extends Facader
{
    public static function getFacadeAccessor()
    {
        return "test";
    }
}