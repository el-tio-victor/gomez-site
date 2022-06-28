<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $table = 'technologies';
    protected $fillable =['technology_name'];

    public $timestamps = false;

    public function technologyTool(){
        return $this->hasMany('App\TechnologyTool','id_technology');
    }

    /*public function works(){
        return $this->belongsToMany('App\Technology');
    }*/

}
