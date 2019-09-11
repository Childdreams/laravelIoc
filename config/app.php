<?php

return [


    /*
    |--------------------------------------------------------------------------
    | 自动加载的服务提供商（全部加载进入可以随时使用）
    |--------------------------------------------------------------------------
    |
    | 这里列出的服务提供者将根据对应用程序的请求自动加载。
    | 您可以随意将自己的服务添加到这个数组中，
    | 以向应用程序授予扩展功能。
    |
    */
    'providers' => [
        \App\Providers\TestServiceProvider::class ,
        \App\Providers\AppServiceProvider::class,
        \App\Providers\RouteServiceProvider::class

    ],

    /*
    |--------------------------------------------------------------------------
    | 别名服务提供商（全部加载进入可以随时使用）
    |--------------------------------------------------------------------------
    |
    |
    */
    'aliases' => [
        "ts" => \baofeng\Demo\Tests\Ts::class ,
        "Route" => \baofeng\Demo\Route\Route::class
    ]
];
//\ts::test() ; == \baofeng\Demo\Tests\Ts::est