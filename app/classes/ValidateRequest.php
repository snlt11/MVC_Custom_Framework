<?php

namespace App\classes;
use Illuminate\Database\Capsule\Manager as Capsule;
class ValidateRequest
{
    private $errors = [];
    private $error_messages = [
        "unique" => "The :attribute field is already in use",
        "required" => "The :attribute must be filled",
        "minLength" => "The :attribute must be at least :policy characters",
        "maxLength" => "The :attribute must be at most :policy characters",
        "email" => "Email Validation Error",
        "string" => "The :attribute must fill only string values",
        "number" => "The :attribute must be fill number values",
        "mixed" => "The :attribute only accepts A-Z0-9 and $ @ . characters"
    ];
    public function checkValidate($data,$policies){
        foreach($data as $column => $value){
            if(in_array($column,array_keys($policies))){
                $this->doValidation([
                    'column' => $column,
                    'value' => $value,
                    'policies' => $policies[$column]
                ]);
            }
        }
    }
    public function doValidation($data){
        $column = $data['column'];
        foreach($data['policies'] as $rule => $policy){
            $valid = call_user_func_array([self::class, $rule],[$column,$data['value'],$policy]);
            if(!$valid){
                $this->setError(
                    str_replace(
                        [":attribute", ":policy"],
                        [$column,$policy],
                        $this->error_messages[$rule],
                    ),
                    $column
                );
            }
        }

    }
    public function unique($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return !Capsule::table($policy)->where($column, $value)->exists();
        }
    }
    public function required($column, $value, $policy)
    {
        return $value != null && !empty(trim($value));
    }
    public function minLength($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return strlen(trim($value)) >= $policy;
        }
    }
    public function maxLength($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return strlen(trim($value)) <= $policy;
        }
    }
    public function email($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
           return filter_var($value, FILTER_VALIDATE_EMAIL);
        }
        return false;
    }
    public function string($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return preg_match("/^[a-zA-Z ]+$/",$value);
        }
        return false;
    }
    public function number($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return preg_match("/^[0-9\.]+$/",$value);
        }
        return false;
    }
    public function mixed($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return preg_match("/^[A-Za-z0-9 \.$@]+$/",$value);
        }
        return false;
    }
    public function setError($error,$key = null){
        if($key){
            $this->errors[$key] = $error;
        }else{
            $this->errors = $error;
        }
    }
    public function hasError(){
        return count($this->errors) > 0;
    }
    public function getError(){
        return $this->errors;
    }

}