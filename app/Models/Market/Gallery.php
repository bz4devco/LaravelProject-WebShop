<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'product_images';

    protected $casts = ['image' => 'array'];

    protected $fillable = [
        'image', 'product_id', 
    ];


    public function product()
    {
        return $this->belongsTo('App\Models\Market\Product');
    }

}
