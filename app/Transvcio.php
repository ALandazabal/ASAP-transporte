<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transervicio extends Model
{
    public function servicio()
    {
        return $this->belongsTo('App\Servicio');
    }

    public function transfer()
    {
        return $this->belongsTo('App\Transfer');
    }
}
