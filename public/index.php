<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */
$cur_time = time();
session_start();
unset($_SESSION['ipList']);
//惩罚处理5分钟
if(in_array(explode('|', $_SESSION['ip'][$_SERVER['SERVER_ADDR']])[0],$_SESSION['ipList'] ? $_SESSION['ipList'] : [])) {
    if((explode('|', $_SESSION['ip'][$_SERVER['SERVER_ADDR']])[1] + 300) > $cur_time) {
        exit('Access Denied');
    } else {
        unset($_SESSION['ip'][$_SERVER['SERVER_ADDR']]);
    }
}

$seconds = '3'; //时间段[秒]
$refresh = '5'; //刷新次数
//设置监控变量

if(isset($_SESSION['last_time'])){
    $_SESSION['refresh_times'] += 1;
}else{
    $_SESSION['refresh_times'] = 1;
    $_SESSION['last_time'] = $cur_time;
}
//处理监控结果
if($cur_time - $_SESSION['last_time'] < $seconds){
    if($_SESSION['refresh_times'] >= $refresh){
        //加入小黑屋
        $_SESSION['ip'][$_SERVER['SERVER_ADDR']] = $_SERVER['SERVER_ADDR'] . '|' . $cur_time;
        $_SESSION['ipList'][$_SERVER['SERVER_ADDR']] = $_SERVER['SERVER_ADDR'];
    }
}else {
    $_SESSION['refresh_times'] = 0;
    $_SESSION['last_time'] = $cur_time;
}




//var_dump($_SESSION['ip'][$_SERVER["SERVER_ADDR"]]);

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);




