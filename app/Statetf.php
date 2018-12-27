<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statetf extends Model
{
    protected $guarded = [] ;

    public function statetransfer(){
    	return $this->hasMany('App\Statetransfer');
    }
}
