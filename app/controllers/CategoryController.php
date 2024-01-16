<?php

namespace App\Controllers;

use App\classes\CSRFToken;
use App\classes\Redirect;
use App\classes\Request;
use App\classes\Session;
use App\classes\UploadFile;

class CategoryController extends BaseController
{
    public function index(){
//        Redirect::to('/');
       view("admin/category/create");
    }
    public function store(){

        $post = Request::get('post');
//        Session::remove('token');
        if(CSRFToken::checkToken($post->token)){
            beautify(Request::get('file'));
            echo "<hr>";
            $fileUpload = new UploadFile();
            var_dump($fileUpload->move(Request::get('file')));
        }else{
            Session::flash('error',"CSRF Fields Error");
            Redirect::back();
        }

//        beautify(Request::all());

    }
}
