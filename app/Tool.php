<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $table    = 'tools';
    protected $fillable = ['tool_name'];

    public $timestamps = false;

    public function technologyTool(){
        return $this->hasMany('App\TechnologyTool','id_tool');
    }
}
