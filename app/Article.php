<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Article extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    
    //
    protected $table = 'articles';
    protected $fillable =['title','content','category_id','user_id','status'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function images(){
        return $this->belongsToMany('App\Image');
    }
    

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function scopeSearchArticle($query,$name){
        return $query->where('title','LIKE',"%$name%");
    }
}
