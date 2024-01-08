<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfflinePayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = ['image' => 'array'];


    protected $guarded = ['id'];



    public function payments()
    {
        return $this->morphMany('App\Models\Market\Payment', 'paymentable');
    }
}
