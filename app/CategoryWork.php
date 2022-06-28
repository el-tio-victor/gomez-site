<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryWork extends Model
{
    //
    protected $table = 'categoriesWork';
    protected $fillable = ['categoryWork_name'];
    
    public $timestamps = false;
    
    public function work(){
        return $this->hasOne('App\Work','id_categoryWork','id');
    }
}
