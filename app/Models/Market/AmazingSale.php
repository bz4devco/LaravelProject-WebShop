<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AmazingSale extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'amazing_sales';

    protected $fillable = [
        'product_id', 'percentage', 'start_date', 'end_date', 'status'
    ];

    protected function product()
    {
        return $this->belongsTo('App\Models\Market\Product');
    }
}
