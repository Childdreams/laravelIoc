<?php


namespace baofeng\Demo\Containers;


use baofeng\Demo\Route\Route;
use mysql_xdevapi\Exception;

class container
{
    public $app;

//    public $app = [
//  "test" => function(){
//    return  new test()
//      }
//];

    public $register = [];

    public $route;

    private $method;

    protected static $obj;

    public function singleton($abstract, callable $concrete = null)
    {
        $this->app[$abstract] = $concrete;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getObj(): container
    {
        if (static::$obj && static::$obj instanceof container) {
            return static::$obj;
        }
        return static:: $obj = new static();
    }

    public function getServicePervice($abstract)
    {
        return $this->app[$abstract];
    }

    //
    public function register(array $bind)
    {
//        is_object($concrete) == new \ReflectionClass($concrete)
        foreach ($bind as $concrete) {
            if (!(new \ReflectionClass($concrete))) {
                throw new \Exception("注入存在错误 " . $concrete, 200);
            }
        }
        $this->register = array_merge($this->register, $bind);
    }

    public function make($abstract)
    {
        $this->getRoute();
        $routers = explode("@", $this->route);
        try {
            new $abstract(...$routers);
        } catch (\Exception $e) {
            throw new \ErrorException($e->getMessage());
        }
    }

    private function getRoute()
    {
        $Root = $_SERVER["PHP_SELF"];
        $match = str_replace("/index.php", "", $Root);
        $this->route = str_replace($match, "", $_SERVER['REQUEST_URI']);
        preg_match("/\S*?(?=\?\S+)/", $this->route, $routeName);
        $routeName = $routeName ?: $this->route;
        $this->method = $_SERVER["REQUEST_METHOD"];
        $funcName = "get" . $this->method;
        $routeName = $routeName ?: '/';
        $this->route = Route::$funcName($this->route);
    }

    public function setRouter($name)
    {

        $this->route = $name;
    }
}