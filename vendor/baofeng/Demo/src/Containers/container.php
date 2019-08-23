<?php


namespace baofeng\Demo\Containers;


class container
{
    public $app ;

    public $register = [];

    protected static $obj ;

    public function singleton($abstract , callable $concrete = null){
        $this->app[$abstract] = $concrete ;
    }

    private function __construct(){}

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getObj() :container
    {
        if (static::$obj && static::$obj instanceof container){
            return static::$obj;
        }
        return static :: $obj = new static();
    }

    public function getServicePervice($abstract)
    {
        return  $this->app[$abstract];
    }
    //
    public function register(array $bind){
        foreach($bind as $concrete){
            if(!( new \ReflectionClass($concrete))){
                throw new \Exception("注入存在错误 ".$concrete,200);
            }
		}
        $this->register = array_merge($this->register , $bind) ;
    }

    public function make($abstract)
    {
        new $abstract();
    }
}