<?php

namespace App\Controllers;

use App\classes\CSRFToken;
use App\classes\Redirect;
use App\classes\Request;
use App\classes\Session;
use App\classes\UploadFile;
use App\classes\ValidateRequest;
use App\models\Category;

class CategoryController extends BaseController
{
    public function index(){
        $cats = Category::all();
        view("admin/category/create",compact('cats'));
    }
    public function store(){
        $post = Request::get('post');
        if(CSRFToken::checkToken($post->token)){
            $rules = [
                "name" => ["required" => true ,"minLength"=>4 ,"unique" => "categories"]
            ];
            $validator = new ValidateRequest();
            $validator->checkValidate($post, $rules);
            if($validator->hasError()){
                $cats = Category::all();
                $errors = $validator->getError();
//                beautify($errors);
                view("admin/category/create",compact('cats','errors'));
            }else{
                echo "Good to go";
            }

        }else{
            Session::flash('error',"CSRF Fields Error");
            Redirect::back();
        }
    }
}
