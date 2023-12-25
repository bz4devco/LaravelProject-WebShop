<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryAttribute extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'name', 'type', 'unit', 'category_id',
    ];


    public function category()
    {
        return $this->belongsTo('App\Models\Market\ProductCategory');
    }
   
    public function values()
    {
        return $this->hasMany('App\Models\Market\CategoryValue');
    }
}
