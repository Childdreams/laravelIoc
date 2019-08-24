<?php


namespace App\Providers;


use baofeng\Demo\ServiceProviders\ServiceProvider;
use baofeng\Demo\Tests\Demo;
use baofeng\Demo\Tests\TDInterface;
use baofeng\Demo\Tests\Test;

class TestServiceProvider extends ServiceProvider
{
    public function reister()
    {
        $this->app->singleton("test" , function () : TDInterface {
            return new Test();
        });
    }
}