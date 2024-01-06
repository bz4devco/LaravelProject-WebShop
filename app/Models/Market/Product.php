<?php

namespace App\Models\Market;

use App\Models\User;
use Carbon\Carbon;
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

    public function guarantees()
    {
        return $this->hasMany('App\Models\Market\guarantee');
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

    public function amazingSales()
    {
        return $this->hasMany('App\Models\Market\AmazingSale');
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }





    public function activeAmazingSales()
    {
        return $this->amazingSales()
        ->where('start_date', '<', Carbon::now())
        ->where('end_date', '>', Carbon::now())
        ->where('status', 1)
        ->first();
    }
    
    public function activeComments()
    {
        return $this->comments()->where('approved', 1)
        ->where('status', 1)
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function activeShowAnswer()
    {
        return $this->comments()->where('answer', '<>', null)
        ->where('answershow', 1)
        ->where('approved', 1)
        ->where('status', 1)
        ->get();
    }
  
    public function activeGuarantees()
    {
        return $this->guarantees()->where('status', 1)->get();
    }
  
    public function activeColors()
    {
        return $this->colors()->where('status', 1)->get();
    }




    // when has amazing sale for product
    //     productFinalPrice = productPrice * productDiscountPrice + productColorPrice + guaranteeProductPrice
    
    // when not amazing sale for product
    //     productFinalPrice = productPrice
    public function showFinalPrice()
    {
        $productColorPrice = $this->activeColors()->first() ? $this->activeColors()->first()->price_increase : 0;
        $productGuaranteePrice = $this->activeGuarantees()->first() ? $this->activeGuarantees()->first()->price_increase : 0;

        if($this->activeAmazingSales()){
            $productDiscountPrice = $this->price * ($this->activeAmazingSales()->percentage / 100);
            return $this->price - $productDiscountPrice + $productColorPrice + $productGuaranteePrice;
        }
        else
        {
            return $this->price + $productColorPrice + $productGuaranteePrice;
        }
    }


}
