<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,SoftDeletes,Sluggable;

    protected $casts = ['image' => 'array'];

    public function sluggable(): array
    {
        return [
            'slug' =>[
                'source' => 'name'
            ]
        ];
    } 


    protected $fillable = [
        'name', 'introduction', 'image', 'weight', 'length', 'width', 'height', 'price', 'sold_number', 'frozen_number', 'status', 'tags', 'marketable', 'marketable_number', 'brand_id', 'category_id', 'published_at'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Market\ProductCategory');
    }


    public function brand()
    {
        return $this->belongsTo('App\Models\Market\Brand');
    }

    public function metas()
    {
        return $this->hasMany('App\Models\Market\ProductMeta');
    }
    
    public function colors()
    {
        return $this->hasMany('App\Models\Market\ProductColor');
    }
    
    public function gallerys()
    {
        return $this->hasMany('App\Models\Market\Gallery');
    }
    
    public function values()
    {
        return $this->hasMany('App\Models\Market\CategoryValue');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Content\Comment', 'commentable');
    }
}
