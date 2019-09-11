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

    /**
     * 修改指针位置
     */
    public function rewind() {
        reset($this->var);
    }

    /**
     * 获取values
     * @return mixed
     */
    public function current() {
        $var = current($this->var);
        return $var;
    }

    /**
     * 获取key
     * @return int|mixed|string|null
     */
    public function key() {
        $var = key($this->var);
        return $var;
    }

    /**
     * 指针下移
     * @return mixed|void
     */
    public function next() {
        $var = next($this->var);
        return $var;
    }

    /**
     * 确定是否到了末尾
     * @return bool
     */
    public function valid() {
        $var = $this->current() !== false;
        return $var;
    }
}