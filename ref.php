<?php

/**
 *    依赖注入取决的 就是 容器和反射 两个部分
 *    可以考虑一个服务提供者
 *    然后 在服务提供者进行注册
 *    服务提供者 在生命周期内
 *    进行注册 或者其他的操作
 *    需要实现接口
 *    接口 register 为注册 handle  为执行 boot 为监听
 */

namespace app;

use app\interfaces\RequestInterface;
use app\interfaces\SendSmsInterface;

/**
 *    实现接口
 */
class Request implements RequestInterface
{
    public $id = "app \\ Request ";
}

class SendSmsService implements SendSmsInterface
{
    public $name = "This is sendSmsSevice ";
}

namespace app\interfaces;

/**
 *    接口类
 *    解耦使用
 */
interface RequestInterface
{

}

namespace app\interfaces;

interface SendSmsInterface
{
}

namespace bpp;

/**
 *    容器类
 */
class Container
{
    public $register = [];

    public $bind = [] ;



    public function register(array $bind)
    {
        foreach ($bind as $concrete) {
            if (!(new \ReflectionClass($concrete))) {
                throw new Exception();
            }
        }
        $this->register = array_merge($this->register, $bind);
    }
}


namespace cpp;

use app\interfaces\RequestInterface;
use app\interfaces\SendSmsInterface;

/**
 * 控制器
 */
class UserController
{
    public function __construct()
    {
    }

    public function test(RequestInterface $request, SendSmsInterface $sendSmsService )
    {
        var_dump($request->id);
        var_dump("this is yyyyyy");
        var_dump($sendSmsService->name);
    }
}

namespace dpp;

use app\interfaces\RequestInterface;

class Request implements RequestInterface {
    public $id = "dpp \\ Request ";
}
namespace test;

use bpp\Container;

//实例化容器
$app = new Container();
//将依赖注册到容器
// \app\interfaces\RequestInterface::class = "\app\interfaces\RequestInterface"
$app->register([
    \app\interfaces\RequestInterface::class => \app\Request::class ,
    \app\interfaces\SendSmsInterface::class => \app\SendSmsService::class
]);


// 模仿路由
$router = "cpp\UserController@test";
$routers = explode("@", $router);

// 将 控制器 反射 出来

$ref = (new \ReflectionClass($routers[0]));


// 获取 控制器的 方法 里面的参数
$refs = $ref->getMethod($routers[1])->getParameters();

$inject = [];
foreach ($refs as $re) {
    //获取参数的类
    $class = $re->getClass()->name;
    // 在容器查询 是否注册过
    if (array_key_exists($class, $app->register)) {
        // 获取 容器内注册的方法
        $class = $app->register[$class];
        //浅显易懂
        $name = $routers[1];
        $inject[] = new $class();
    } else {
        throw new \Exception("bug");
    }
}
$classes = $ref->newInstance();  // == new $ref
//var_dump(gettype($classes));
(new $classes())->{$name}(...$inject);
//var_dump($inject); [1,2,3] function(1,2,3)
//function(...[1,2,3]){} ,  function(1,2,3)
call_user_func_array([$classes , $name] , $inject) ; //
function test(){
   var_dump( func_get_args());
}
