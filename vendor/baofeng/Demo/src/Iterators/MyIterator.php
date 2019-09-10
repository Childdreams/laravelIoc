<?php


namespace baofeng\Demo\Iterators;


class MyIterator implements \Iterator
{
    private $var = array();

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
    }

    public function rewind() {
        reset($this->var);
    }

    public function current() {
        $var = current($this->var);
        return $var;
    }

    public function key() {
        $var = key($this->var);
        return $var;
    }

    public function next() {
        $var = next($this->var);
        return $var;
    }

    public function valid() {
        $var = $this->current() !== false;
        return $var;
    }
}