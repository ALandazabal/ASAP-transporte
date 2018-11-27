<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpago extends Model
{
    protected $guarded = [] ;

    public function transfer(){
    	return $this->hasMany('App\transfer');
    }
}
