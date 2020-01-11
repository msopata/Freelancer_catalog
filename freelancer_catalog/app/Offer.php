<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    public function accounts()
    {
        return $this->belongsTo(Accounts::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
