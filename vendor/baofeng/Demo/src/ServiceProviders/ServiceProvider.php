<?php
namespace baofeng\Demo\ServiceProviders;

use baofeng\Demo\Containers\container;
use baofeng\Demo\Tests\Test;

abstract class ServiceProvider
{
    public $app ;

    public function __construct(container &$app)
    {
        $this->app = $app ;
    }

    public function reister()
    {

    }

    public function boot()
    {

    }


}