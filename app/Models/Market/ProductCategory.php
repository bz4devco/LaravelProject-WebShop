<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
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
        'name', 'description', 'image', 'status', 'show_in_menu', 'tags', 'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo($this, 'parent_id')->with('parent');
    }


    public function children()
    {
        return $this->hasMany($this, 'parent_id')->with('children');
    }
    
    public function products()
    {
        return $this->hasMany('App\Models\Market\Product', 'category_id');
    }

    public function attributes()
    {
        return $this->hasMany('App\Models\Market\CategoryAttribute');
    }
}
