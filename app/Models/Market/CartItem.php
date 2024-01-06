<?php

namespace App\Models\Market;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'product_id', 'color_id', 'guarantee_id', 'number'
    ];


    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }

    public function color()
    {
        return $this->belongsTo("App\Models\Market\ProductColor");
    }

    public function guarantee()
    {
        return $this->belongsTo("App\Models\Market\Guarantee");
    }

    public function product()
    {
        return $this->belongsTo("App\Models\Market\Product");
    }


    // finalPrice = productPrice + colorPrice + guaranteePrice
    public function cartItemProductPrice() 
    {
        $guaranteePriceIncrease = empty($this->guarantee_id) ? 0 : $this->guarantee->price_increase;
        $colorPriceIncrease = empty($this->color_id) ? 0 : $this->color->price_increase;
        return $this->product->price + $guaranteePriceIncrease + $colorPriceIncrease;
    }

    // ProductPrice * (discountPerecentage / 100)
    public function cartItemProductDiscount()
    {
        $cartItemProductPrice = $this->product->price;
        $productDiscount = empty($this->product->activeAmazingSales()) ? 0 : $cartItemProductPrice * 
        ($this->product->activeAmazingSales()->percentage / 100);
        
        return $productDiscount;
    }

    // number * (productPrice + colorPrice + guarantee - disountPrice)
    public function cartItemFinalPrice()
    {
        $cartItemProductPrice = $this->cartItemProductPrice();
        $productDiscount = $this->cartItemProductDiscount();
        return $this->number * ($cartItemProductPrice - $productDiscount);
    }

    // nnumber * productDiscount
    public function cartItemFinalDiscount()
    {
        $productDiscount = $this->cartItemProductDiscount();
        return $this->number * $productDiscount;
    }

}
