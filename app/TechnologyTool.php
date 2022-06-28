<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnologyTool extends Model
{
    //
    protected $table    = 'technology_tool';
    protected $fillable = ['id_technology','id_tool'];
    
    public $timestamps  = false;

    public function technology(){
        return $this->belongsTo('App\Technology','id_technology');
    }

    public function tool(){
        return $this->belongsTo('App\Tool','id_tool');
    }

    public function works(){
        return $this->belongsToMany('App\Work','work_technology','id_work','id_technology_tool');
    }
}
