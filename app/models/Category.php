<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as Capsule;

class Category extends Model
{
    protected $fillable = ["name", "slug"];
    public function genPaginate($limit){
        $table = $this->getTable();
        $categories = [];
        $cats = Capsule::select("SELECT * FROM $table ORDER BY id DESC". $limit);

        foreach ($cats as $cat){
            $date = new Carbon($cat->created_at);
            $categories[] = [
                "id" => $cat->id,
                "name" => $cat->name,
                "slug" => $cat->slug,
                "created_at" => $date->toFormattedDateString()
            ];
        }
//           array_push($categories,[
//           "id" => $cat->id,
//            "name" => $cat->name,
//            "slug" => $cat->slug,
//            "created_at" => $date->toFormattedDateString()
//        ]);
        return $categories;
    }

}