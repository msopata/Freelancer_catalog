<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function offer()
    {
        return $this->belongsTo('App\Offer');
    }
}
