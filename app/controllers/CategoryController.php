<?php

namespace App\Controllers;

use App\classes\Request;

class CategoryController extends BaseController
{
    public function index(){
        view("admin/category/create");
    }
    public function store(){
/*
        Testing
        beautify($_FILES);
        beautify(Request::all());
        beautify(Request::all(true));
        beautify(Request::get('post'));
        beautify(Request::has('file'));
        beautify(Request::old('post','name'));
*/
        beautify(Request::old('post','name'));


    }
}
