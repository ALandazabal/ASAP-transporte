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

    public static function servicioSelect($id){
        return Precio::where('tviaje_id','=',$id)->select("comuna_id")->get();
        /*return DB::select('select comuna_id from precios where tviaje_id = 1');*/
    }
}
