<?php

use App\Routing\RouteDispatcher;

$router = new AltoRouter();
$router->setBasePath("/E-Commerce/public");

$router->map("GET","/","App\Controllers\IndexController@show","Home Route");

new RouteDispatcher($router);