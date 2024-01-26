<?php

namespace App\Models\Market;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function paymentable()
    {
        return $this->morphTo();
    }


    public function scopeSpanningPayment($query, $month, $payment)
    {
        $query->selectRaw('monthname(created_at) month, count(*) published')
        ->where('created_at' , '>' , Carbon::now()->subMonth($month))
        ->whereStatus($payment)
        ->groupBy('month')
        ->latest();
    }
}
