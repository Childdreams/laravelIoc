<?php


namespace baofeng\Demo\Https;


use baofeng\Demo\Iterators\MyIterator;
use Symfony\Component\VarDumper\Tests\Caster\MyArrayIterator;

class Request implements RequestInterface , \IteratorAggregate
{
    private $argv ;

    public function __construct()
    {
        $this->argv = $_REQUEST;
    }

    public  function get($input , $default = "")
    {
        return isset($this->argv[$input]) ? $this->argv[$input] : $default;
    }

    public  function all()
    {
        return $this->argv;
    }

    public function getIterator()
    {
        return new MyIterator($this->argv);
    }

    public function is_Method($method)
    {
        return strtoupper($_SERVER["REQUEST_METHOD"]) === $method;
    }
}