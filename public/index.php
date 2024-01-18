<?php

use App\classes\Session;

require_once "../bootstrap/init.php";

$test = "Local@# Tester";
//$var = "local-tester";
echo slug($test);



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


