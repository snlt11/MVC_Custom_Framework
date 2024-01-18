<?php

use Philo\Blade\Blade;

function view($path, $data = []){
    $view = APP_ROOT . '/resources/views/';
    $cache = APP_ROOT . '/bootstrap/cache/';
    $blade = new Blade($view, $cache);
    echo $blade->view()->make($path,$data)->render();

}

function beautify($data){
    echo  "<pre>".print_r($data, true)."</pre>";
}

function asset($link){
    echo URL_ROOT .'/assets/'.$link;
}
