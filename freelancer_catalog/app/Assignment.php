<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function users()
    {
        return $this->hasOne('App\User');
    }

    public function offers()
    {
        return $this->belongsTo('App\Offer');
    }
}
