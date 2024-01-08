<?php

namespace App\controllers;

class IndexController extends BaseController
{
    public function show(){
        echo 'I am Show Methods of '. __CLASS__ . 'class!';
    }
}