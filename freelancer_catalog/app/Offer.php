<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    public function accounts()
    {
        return $this->belongsTo(Accounts::class);
    }

    public function offerusers()
    {
        return $this->hasOne('App\User', 'owner', 'id');
    }
}
