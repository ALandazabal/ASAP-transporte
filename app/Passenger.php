<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $guarded = [] ;

    public function transfer(){
    	return $this->hasMany('App\Transfer');
    }
}
