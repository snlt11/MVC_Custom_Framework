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
        $categories = Category::all()->count();
        list($cats,$pages) = paginate(3,$categories,new Category());
        $cats = json_decode(json_encode($cats));
        view("admin/category/create",compact('cats','pages'));
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
                view("admin/category/create",compact('cats','errors'));
            }else{
                $slug = slug($post->name);
                $con = Category::create([
                   "name" => $post->name,
                    "slug" => $slug
                ]);
                if($con){
                    $cats = Category::all();
                    $success = "Category created successfully";
                    view("admin/category/create",compact('cats','success'));
                }else{
                    echo "error";
                }
//                $slug = slug($post->name);
//                $category = new Category();
//                $category->name = $post->name;
//                $category->slug = $slug;
//                if($category->save()){
//                    echo "save";
//                }else{
//                    echo "failed";
//                }

            }

        }else{
            Session::flash('error',"CSRF Fields Error");
            Redirect::back();
        }
    }

    public function delete($id){
        $con = Category::destroy($id);
        if($con){
            Session::flash('delete_success',"Category deleted successfully");
            Redirect::to('/admin/category/create');
        }else{
            Session::flash('delete_fail',"Category delete failed");
            Redirect::to('/admin/category/create');
        }
    }
}
