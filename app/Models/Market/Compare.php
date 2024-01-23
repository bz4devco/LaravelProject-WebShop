<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compare extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }

    public function products() 
    {
        return $this->belongsToMany('App\Models\Market\Product');
    }
}
