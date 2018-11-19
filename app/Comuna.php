<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $guarded = [] ;

    public function transfers(){
    	return $this->hasMany('App\Transfer');
    }
}
