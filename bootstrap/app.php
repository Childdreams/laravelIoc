<?php

//加载 配置文件
$ServiceProvide = include_once __DIR__."/../config/app.php";

$app = \baofeng\Demo\Containers\container::getObj();

$app->make(\baofeng\Demo\Kernels\kernel::class);
/*
 | ----------------------------------------------------------
 |  优化部分
 | ----------------------------------------------------------
 |
 | 这里可以把整个config 里面的 配置文件 作为集合加载进入 container 里面
 | 这样就可以随时可以用到 配置文件
 |
 */

//将依赖注册到容器
$app->register([
    \baofeng\Demo\Https\RequestInterface::class => \baofeng\Demo\Https\RequestInterface::class
]);
$app->register([
    \baofeng\Demo\Https\SendSmsInterface::class => \baofeng\Demo\Https\SendSmsService::class
]);


array_walk($ServiceProvide["providers"] , function ($provider) use ($app){
    (new $provider($app))->reister();
});

array_walk($ServiceProvide["aliases"]  , function ($index , $alias){
    class_alias( $index , $alias);
});

//\baofeng\Demo\Tests\Ts::get();
//Ts::get();
