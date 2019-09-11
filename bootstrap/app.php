<?php


//加载 配置文件

//实例化容器 -> 单例模式的容器
$app = \baofeng\Demo\Containers\container::getObj();



//将依赖注册到容器
$app->make(\baofeng\Demo\Kernels\kernel::class);

