<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'city_id', 'postal_code', 'address', 'no', 'unit', 'recipient_first_name', 'recipient_last_name', 'mobile', 'status'
    ];

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function getRecipientFullNameAttribute()
    {
        return "{$this->recipient_first_name} {$this->recipient_last_name}";
    }


}
