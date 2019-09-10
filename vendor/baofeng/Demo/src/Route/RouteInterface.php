<?php


namespace baofeng\Demo\Route;


interface RouteInterface
{
    public static function get(string $route ,string $controller);
    public static function post(string $route ,string $controller);
    public static function any(string $route ,string $controller);
}