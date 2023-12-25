<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'status'];


    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket\Ticket', 'category_id');
    }
}
