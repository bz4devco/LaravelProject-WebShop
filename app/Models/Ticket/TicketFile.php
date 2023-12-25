<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketFile extends Model
{
    use HasFactory;

    protected $table = 'ticket_files';

    protected $fillable = ['file_path', 'file_size', 'file_type', 'ticket_id', 'user_id', 'status'];


    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket\Ticket', 'ticket_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
