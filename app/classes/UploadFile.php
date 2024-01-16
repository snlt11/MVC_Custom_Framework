<?php

namespace App\classes;

class UploadFile
{
    protected $filename;
    protected $maxSize = 209715;
    public function getName($file,$name=''){
        if($name === ''){
            $name = pathinfo($file->file->tmp_name,PATHINFO_FILENAME);
        }
        $name = strtolower($name);
        $hash = md5(microtime());
        $ext = pathinfo($file->file->name,PATHINFO_EXTENSION);
        return"{$name}-{$hash}.{$ext}";
    }
//    public function checkSize($file){
//        return $file->file->size > $this->maxSize;
//    }
//    public function isImage($file){
//        $ext = pathinfo($file->file->name,PATHINFO_EXTENSION);
//        $validExt = ["jpb","gif","png","bmp","tmp"];
//        return in_array($ext,$validExt);
//
//    }
    public function move($file,$file_name=''){
         $filename = $this->getName($file);
            $path = APP_ROOT .'/public/assets/uploads/';
            if(!is_dir($path)) {
                mkdir($path);
            }
            $file_path = $path . $filename;
            return move_uploaded_file($file->file->tmp_name, $file_path);
    }
}