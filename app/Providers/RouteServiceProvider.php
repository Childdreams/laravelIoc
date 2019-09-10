<?php


namespace App\Providers;


use baofeng\Demo\ServiceProviders\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Controllers';

    public function map()
    {
        $this->mapWebRoutes();
        //
    }

    protected function mapWebRoutes()
    {

    }
}