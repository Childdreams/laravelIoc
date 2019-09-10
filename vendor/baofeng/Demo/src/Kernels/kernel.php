<?php


namespace baofeng\Demo\Kernels;


use baofeng\Demo\Containers\container;

class kernel
{
    public $config = [];

    public $app;

    /**
     * 实例化 部分需要注入的 且顺序不可以变
     * kernel constructor.
     * @param $controller
     * @param $function
     * @throws \Exception
     */
    public function __construct($controller, $function)
    {
        $this->app = container::getObj();

        $this->init();

        $this->reisterServiceProvider();

        $this->GetReflectionClass($controller, $function);

    }


    private function GetReflectionClass($controller, $function)
    {
        $ref = (new \ReflectionClass($controller));
        // 获取 控制器的 方法 里面的参数
        $refs = $ref->getMethod($function)->getParameters();
        $inject = [];
        $classes = $ref->newInstance();
        $name = $function;
        foreach ($refs as $re) {

            //获取参数的类
            $class = $re->getClass()->name;
            // 在容器查询 是否注册过
            if (array_key_exists($class, $this->app->register)) {
                // 获取 容器内注册的方法
                $class = $this->app->register[$class];
                //浅显易懂
                $inject[] = new $class();
            } else {
                throw new \Exception("bug");
            }
        }
        call_user_func_array([$classes, $name], $inject);
        // 上下意思一致
//        (new $classes())->{$name}(...$inject);
    }

    private function reisterServiceProvider()
    {
        $app = $this->app;
        array_walk($this->config["app"]["providers"], function ($k, $provider) use ($app) {
            (new $k($app))->reister();
        });
        $this->registerAlias();
    }

    private function registerAlias()
    {
        array_walk($this->config["app"]["aliases"], function ($index, $alias) {
            class_alias($index, $alias);
        });
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

