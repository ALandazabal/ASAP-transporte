<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    public function vehicle(){
    	return $this->belongsTo('App\Vehicle');
    }

    /*public function comuna(){
    	return $this->belongsTo('App\Comuna');
    }*/

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function precio(){
        return $this->belongsTo('App\Precio');
    }

    public function passenger(){
        return $this->belongsTo('App\Passenger');
    }

    public function mpago(){
        return $this->belongsTo('App\Mpago');
    }

    protected $guarded = [] ;

    public function transvcio(){
    	return $this->hasMany('App\transvcio');
    }

    public function statetransfer(){
        return $this->hasMany('App\Statetransfer');
    }

    public function scopeEmail($user_id){
        if($user_id)
            return Transfer::find($user_id);
    }
}
