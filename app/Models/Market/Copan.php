<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Copan extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'code', 'amount', 'amount_type', 'discount_ceiling', 'type','start_date', 'end_date', 'user_id', 'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
