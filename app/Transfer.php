<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    public function vehicle(){
    	return $this->belongsTo('App\Vehicle');
    }

    public function comuna(){
    	return $this->belongsTo('App\Comuna');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
