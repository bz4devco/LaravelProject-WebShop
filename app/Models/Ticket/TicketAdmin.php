<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketAdmin extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id'];
    

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket\Ticket', 'reference_id');
    }

}
