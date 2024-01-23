<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['subject','answer', 'description', 'status', 'seen', 'reference_id',  'priority_id',  'category_id', 'ticket_id', 'user_id', 'answer_at', 'answer_status'];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function priority()
    {
        return $this->belongsTo('App\Models\Ticket\TicketPriority');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Ticket\TicketCategory');
    }

    public function ticketFiles()
    {
        return $this->hasMany('App\Models\Ticket\TicketFile', 'ticket_id');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Ticket\TicketAdmin', 'reference_id');
    }



    
    public function ticketStatus()
    {
        return $this->answer ? 'پاسخ توسط ادمین' : ($this->seen == 1 ? 'در حال بررسی' : 'در انتظار پاسخ');
    }
}
