<?php


namespace baofeng\Demo\Https;


class Request implements RequestInterface
{
    public function get()
    {
        return "This Class is Request implements RequestInterface ";
    }
}