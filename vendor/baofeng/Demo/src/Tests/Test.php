<?php


namespace baofeng\Demo\Tests;


class Test implements TDInterface
{
    public function __construct()
    {
        var_dump("This is Test");
    }

    public function get(){
        var_dump("Test Vendor!!!");
    }
}