<?php


namespace baofeng\Demo\Tests;


class Test implements TDInterface
{
    public function __construct()
    {
        dump("This is Test");
    }

    public function get(){
        dump("Test Vendor!!!");
    }
}