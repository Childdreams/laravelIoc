<?php


namespace App\Providers;


use baofeng\Demo\ServiceProviders\ServiceProvider;
use baofeng\Demo\Tests\Test;

class TestServiceProvider extends ServiceProvider
{
    public function reister()
    {
        $this->app->singleton("test" , function (){
            return new Test();
        });
    }
}