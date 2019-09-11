<?php


namespace baofeng\Demo\Facaders;


use baofeng\Demo\Containers\container;

abstract class Facader
{
    protected static $app;

    public static function demo()
    {
        var_dump(1 . "Facader Demo!!!");
    }


    public static function getfactory()
    {
        return static:: getFacadeAccessor();
    }

    public static function setFacadeApplication($app)
    {
        static:: $app = $app;
    }

    public static function getFacadeApplication($abstract)
    {
        if (!static::$app) {
            static:: setFacadeApplication(container::getObj());
        }
        return static::$app->getServicePervice($abstract);
    }


    public static function __callStatic($method, $arguments)
    {
        return (static::getFacadeApplication(static::getfactory()))()->$method(...$arguments);
    }

    public static function getFacadeAccessor()
    {
    }
}