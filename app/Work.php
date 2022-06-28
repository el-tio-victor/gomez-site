<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Work extends Model
{
    
    use Sluggable;
    use SluggableScopeHelpers;

    protected $table='works';
    protected $fillable=['title','detail','url','id_categoryWork'];

    public function images(){
        return $this->belongsToMany('App\Image','work_image');
    }

    public function technologyTool(){
        return $this->belongsToMany('App\TechnologyTool','work_technology','id_work','id_technology_tool');
    }

    public function categoryWork(){
        return $this->belongsTo('App\CategoryWork','id_categoryWork','id');
    }
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
