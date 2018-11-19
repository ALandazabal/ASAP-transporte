<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['description', 'passengers', 'photo'];

    public function transfers(){
    	return $this->hasMany('App\Transfers');
    }
}
