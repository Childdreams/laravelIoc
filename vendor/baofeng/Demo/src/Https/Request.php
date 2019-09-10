<?php


namespace baofeng\Demo\Https;


use baofeng\Demo\Iterators\MyIterator;
use Symfony\Component\VarDumper\Tests\Caster\MyArrayIterator;

class Request implements RequestInterface , \IteratorAggregate
{
    private $argv ;

    private $ttt = [1,2,3,4,5,6];

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
}