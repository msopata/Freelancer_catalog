<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    public function accounts()
    {
        return $this->belongsTo(Accounts::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
