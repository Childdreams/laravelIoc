
# laravel 个人理解

> 里面集成了
 
> 依赖注入 、 容器 、 门面模式 、 别名 

> 之后又新的模式会继续集成

## 依赖注入

* 理解
    
    依赖注入的实现方式就是 将需要注入的服务注册到容器内， 当路由访问一个控制器的时候 利用反射```ReflectionClass``` 去获取需要注入的服务。然后将服务进行实例化注入
    
    代码实现部分
    ```php
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
    call_user_func_array([$classes , $name] , ...$inject) ; 
    ```
    至于怎么注册到容器 laravel 的写法是 服务提供者。 将服务提供者注册到 
    
    见[bootstrap/app.php](\config\app.php)
    
    将服务提供者携带的 服务注册到 容器中 [bootstrap/app.php](\config\app.php) line 23 
    
    [baofeng\Demo\Kernel\Kernel@reisterServiceProvider](vendor\baofeng\Demo\src\Kernels\kernel.php)
    
## 门面模式

 门面模式的核心内容 依旧是将门面模式的注入到容器之中 。在正常的 门面模式直接返回注入时候的key ， 通过 __callstatic  去容器中查询 
 
 [baofeng\Demo\Facaders\Facader](\vendor\baofeng\Demo\src\Facaders\Facader.php)
    
## 迭代器 IteratorAggregate

laravel 中 db 等 对象进行foreach 循环时候 ，循环出来的只是它想让你循环的东西  这时候就用到了

```baofeng\Demo\Https\Request```

[baofeng\Demo\Iterators\MyIterator](vendor/baofeng/Demo/src/Iterators/MyIterator.php)

详细的注释在 [baofeng\Demo\Iterators\MyIterator](\vendor\baofeng\Demo\src\Iterators\MyIterator.php) 中