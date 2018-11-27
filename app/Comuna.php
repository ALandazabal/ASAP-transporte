<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $guarded = [] ;

    public function precio(){
    	return $this->hasMany('App\Precio');
    }
}
