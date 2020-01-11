<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    public function user()
    {
        return $this->hasMany(Offer::class, 'owner');
    }
}
