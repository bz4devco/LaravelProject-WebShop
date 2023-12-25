<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductMeta extends Model
{
    use HasFactory;

    protected $table = 'product_meta';

    protected $fillable = [
        'meta_key', 'meta_value', 'product_id',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Market\Product');
    }
}
