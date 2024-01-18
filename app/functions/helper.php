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

//function tester($value){
//    $value = preg_replace('/[^'.preg_quote('_').'\pL\pN\s]+/u',"",mb_strtolower($value));
//    $value = preg_replace('/['.preg_quote('-').'\s\']/','-',$value);
//
//    return $value;
//}
function slug($value){
    // Remove characters that are not underscores, letters, numbers, or spaces
    $value = preg_replace('/[^\pL\pN\s_]+/u', '', mb_strtolower($value));

    // Replace spaces, underscores, and certain characters with hyphens
    $value = preg_replace('/[\s_]+/', '-', $value);

    return $value;
}

