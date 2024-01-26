<?php

namespace App\Models\Market;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ['id'];

    
    public function order()
    {
        return $this->belongsTo('App\Models\Market\Order');
    }
    
    public function sengleProduct()
    {
        return $this->belongsTo('App\Models\Market\Product', 'product_id');
    }
    
    public function amazingSale()
    {
        return $this->belongsTo('App\Models\Market\AmazingSale', 'amazing_sale_id');
    }
    
    public function color()
    {
        return $this->belongsTo('App\Models\Market\ProductColor');
    }
        
    public function guarantee()
    {
        return $this->belongsTo('App\Models\Market\Guarantee');
    }
        
    public function orderItemAttributes()
    {
        return $this->hasMany('App\Models\Market\OrderItemSelectedAttribute');
    }


    public function scopeSpanningSoldProducts($query, $month)
    {
        $query->selectRaw('monthname(created_at) month, count(number) sold')
        ->where('created_at' , '>' , Carbon::now()->subMonth($month))
        ->groupBy('month')
        ->latest();
    }
}
