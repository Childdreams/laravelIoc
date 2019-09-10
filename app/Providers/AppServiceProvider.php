<?php


namespace App\Providers;


use baofeng\Demo\ServiceProviders\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function reister()
    {
        $this->app->register(
            [
                \baofeng\Demo\Https\RequestInterface::class => \baofeng\Demo\Https\Request::class ,
                \baofeng\Demo\Https\SendSmsInterface::class => \baofeng\Demo\Https\SendSmsService::class,
            ]
        );
    }
}