<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Category extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    //
    protected $table = "categories";
    protected $fillable =['name'];


    public function articles(){
        return $this->hasMany('App\Article');
    }
    
    public function sluggable(){
        return [
            'category_slug' => [
                'source' => 'name'
            ]
        ];
    }
    
    public function scopeSearchCategory($query,$name){
        return $query->where('title','LIKE',"%$name%");
    }
}
