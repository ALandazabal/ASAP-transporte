<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    public function comuna()
    {
        return $this->belongsTo('App\Comuna');
    }

    public function tviaje()
    {
        return $this->belongsTo('App\Tviaje');
    }

    protected $guarded = [] ;

    public function transfer(){
    	return $this->hasMany('App\Transfer');
    }
}
