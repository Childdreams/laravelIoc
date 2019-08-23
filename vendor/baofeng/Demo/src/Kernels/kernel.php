<?php


namespace baofeng\Demo\Kernels;


use baofeng\Demo\Containers\container;

class kernel
{
    public $config = [];

    public $app ;

    public function __construct($controller , $function)
    {
        $this->app = container::getObj();
//        $app = \baofeng\Demo\Containers\container::getObj();
//        array_walk($ServiceProvide["providers"] , function ($k ,$provider) use ($app){
//            (new $provider($app))->reister();
//        });
//
//        array_walk($ServiceProvide["aliases"]  , function ($index , $alias){
//            class_alias($alias , $index);
//        });
        $this->init();
        $ref = (new \ReflectionClass($controller));

// 获取 控制器的 方法 里面的参数
        $refs = $ref->getMethod($function)->getParameters();

        $inject = [];
        $classes = $ref->newInstance();

        foreach ($refs as $re){

            //获取参数的类
            $class = $re->getClass()->name;
            // 在容器查询 是否注册过
            if (array_key_exists($class , $this->app->register)){
                // 获取 容器内注册的方法
                $class = $this->app->register[$class];
                //浅显易懂
                $name = $function;
                $inject[] = new $class();
            }else {
                throw new \Exception("bug");
            }
        }
        (new $classes())->{$name}(...$inject);
    }


    public function init()
    {
        $this->getFile("config");
    }

    public function getFile($dir = ""){
        $file = scandir($dir);
        foreach ($file as $f){
            if ($f == "." || $f == ".."){
                continue;
            }
            if (is_dir($f)){
                $this->getFile($dir.'/'.$f);
            }else{
                $dirs = str_replace("/" ,"." , $dir."/".$f);
                $dirs = str_replace(".php" ,"" , $dirs);
                $dirs = str_replace("config." ,"" , $dirs);
                $this->config[$dirs] = require_once $dir.'/'.$f;
            }

        }
    }
}

