<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductColor extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [
        'name', 'product_id', 'price_increase', 'sold_number', 'frozen_number', 'marketable_number', 'status'
    ];

    
    public function product()
    {
        return $this->hasMany('App\Models\Market\Product');
    }
}