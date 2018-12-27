<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statetransfer extends Model
{
    public function statetf()
    {
        return $this->belongsTo('App\Statetf');
    }

    public function transfer()
    {
        return $this->belongsTo('App\Transfer');
    }
}
