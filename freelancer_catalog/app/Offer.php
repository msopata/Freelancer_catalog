<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    public function accounts()
    {
        return $this->belongsTo('App\Accounts');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function assignments()
    {
        return $this->hasMany('App\Assignments');
    }
}
