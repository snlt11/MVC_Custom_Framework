<?php

use Philo\Blade\Blade;
use voku\helper\Paginator;

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

function slug($value){
    $value = preg_replace('/[^'.preg_quote('_').'\pL\pN\s]+/u',"",mb_strtolower($value));
    $value = preg_replace('/[ _]/','-',$value);
    return $value;
}

function paginate($num_of_records,$total_record,$object){
    $pages = new Paginator($num_of_records,'p');
    $categories = $object->genPaginate($pages->get_limit());
    $pages->set_total($total_record);

    return [$categories,$pages->page_links()];
}

//function slug($value){
//    // Remove characters that are not underscores, letters, numbers, or spaces
//    $value = preg_replace('/[^\pL\pN\s_]+/u', '', mb_strtolower($value));
//
//    // Replace spaces, underscores, and certain characters with hyphens
//    $value = preg_replace('/[\s_]+/', '-', $value);
//
//    return $value;
//}

