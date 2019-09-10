<?php


namespace baofeng\Demo\Route;


class Route implements RouteInterface
{
    private static $get = [];

    private static $post = [];

    private static $any = [];

    /**
     * method  get
     * @param string $route
     * @param string $controller
     */
    public static function get(string $route , string $controller ):void
    {
        static::$get[trim($route,"/")] = $controller;
    }

    /**
     * method post
     * @param string $route
     * @param string $controller
     */
    public static function post (string $route , string $controller):void
    {
        static::$post[trim($route,"/")] = $controller;
    }

    /**
     * method any
     * @param string $route
     * @param string $controller
     */
    public static function any (string $route , string $controller):void
    {
        static::$any[trim($route,"/")] = $controller;
    }

    public static function getGET($name)
    {
        if (!isset(static :: $get[trim($name , "/")])){
            throw new \Exception("This route ".$name ." dont't find ");
        }
        return static :: $get[trim($name , "/")];
    }

    public static function getPOST($name)
    {
        if (!isset(static :: $post[trim($name , "/")])){
            throw new \Exception("This route ".$name ." dont't find ");
        }
        return static :: $post[trim($name , "/")];
    }

    public static function getANY($name)
    {
        if (!isset(static :: $any[trim($name , "/")])){
            throw new \Exception("This route ".$name ." dont't find ");
        }
        return static :: $any[trim($name , "/")];
    }


}