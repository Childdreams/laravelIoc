<?php

//加载 配置文件
$ServiceProvide = include_once __DIR__."/../config/app.php";


//实例化容器 -> 单例模式的容器
$app = \baofeng\Demo\Containers\container::getObj();

//将服务提供者注册
array_walk($ServiceProvide["providers"] , function ($provider) use ($app){
    (new $provider($app))->reister();
});

// 别名 的实现
array_walk($ServiceProvide["aliases"]  , function ($index , $alias){
    class_alias( $index , $alias);
});

$route = "App\\Controllers\\UserController@get";
$app->SetRouter($route);
//将依赖注册到容器
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




//\baofeng\Demo\Tests\Ts::get();
//\baofeng\Demo\Tests\Ts::get();
//Ts::get();
