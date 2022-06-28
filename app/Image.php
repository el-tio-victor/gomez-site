<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable=['name'];

    public function articles(){
        return $this->belongsToMany('App\Article')->withPivot('article_id', 'image_id');
    }

    public function works(){
        return $this->belongsToMany('App\Work','work_image')->withPivot('article_id', 'image_id');
    }
}
