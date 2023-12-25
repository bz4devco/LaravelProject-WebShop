<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo('App\Models\User');
    }


    public function paymentable()
    {
        return $this->morphTo();
    }
}
