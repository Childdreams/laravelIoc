<?php


namespace baofeng\Demo\Tests;


class Demo implements TDInterface
{
    public function __construct()
    {
        var_dump("This is Demo!!!");
    }

    public function get(){
        var_dump("Test Vendor!!!  Demo");
    }
}