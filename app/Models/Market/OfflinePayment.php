<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfflinePayment extends Model
{
    use HasFactory,SoftDeletes;

    protected $casts = ['image' => 'array'];


    protected $fillable = [
        'name', 'introduction', 'image', 'weight', 'length', 'width', 'height', 'price', 'sold_number', 'frozen_number', 'status', 'tags', 'marketable', 'marketable_number', 'brand_id', 'category_id', 'published_at'
    ];

  
    public function payments()
    {
        return $this->morphMany('App\Models\Market\Payment', 'paymentable');
    }
}
