<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class Tag extends Model
{
    
    use Sluggable;
    use SluggableScopeHelpers;
    
    protected $table='tags';
    protected $fillable=['name'];

    public function articles(){
        return $this->belongsToMany('App\Article');
    }

    public function sluggable(){
        return [
            'tag_slug' => [
                'source' => 'name'
            ]
        ];
    }
    
    public function scopeSearchTag($query,$name){
        return $query->where('name','LIKE',"%$name%");
    } 
}
