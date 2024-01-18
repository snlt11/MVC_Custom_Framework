<?php
use Illuminate\Database\Capsule\Manager as Capsule;

use App\classes\Session;

require_once "../bootstrap/init.php";

//$user = Capsule::table('categories')->where('id',1)->get();
//beautify($user);




//Error Testing
//$post = [
//  "name" => "Mg Mg",
//  "age" => 23,
//  "email"=> "tester@gmail.com"
//];
//$policy = [
//    "name" => ["string"=>true,"minLength"=>5],
//    "age" => ["number"=>true,"minLength"=>2],
//    "email" => ["email"=>true,"maxLength"=>25]
//
//];
//
//$validator = new \App\classes\ValidateRequest();
//$validator->checkValidate($post,$policy);
//if($validator->hasError()){
//    beautify($validator->getError());
//}else{
//    echo "good to go";
//}
//$con = $validator->number("email","123.12",5);
//var_dump($con);


