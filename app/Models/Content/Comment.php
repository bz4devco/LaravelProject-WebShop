<?php

namespace App\Models\Content;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer'
    ];


    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function responder()
    {
        return $this->belongsTo(User::class, 'responder_id');
    }

    
    public function commentable()
    {
        return $this->morphTo();
    }
}
