<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tviaje extends Model
{

    protected $guarded = [] ;

    public function precio(){
    	return $this->hasMany('App\Precio');
    }
}
