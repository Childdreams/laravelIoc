<?php


namespace baofeng\Demo\Kernels;


class kernel
{
    public function __construct()
    {

//        $app = \baofeng\Demo\Containers\container::getObj();
//        array_walk($ServiceProvide["providers"] , function ($k ,$provider) use ($app){
//            (new $provider($app))->reister();
//        });
//
//        array_walk($ServiceProvide["aliases"]  , function ($index , $alias){
//            class_alias($alias , $index);
//        });
        $this->init();
    }


    public function init()
    {
        $a = require_once "config/app.php";
        var_dump($a);
        die;
    }
}

