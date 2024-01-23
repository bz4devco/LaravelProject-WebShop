<?php

namespace App\Models\Content;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'answer', 'body', 'author_id', 'parent_id', 'responder_id','commentable_id','commentable_type','answershow','seen', 'approved', 'status', 'answer_date'
    ];


    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function responder()
    {
        return $this->belongsTo(User::class, 'responder_id');
    }

    public function parent()
    {
        return $this->belongsTo($this, 'parent_id')->with('parent');
    }


    public function answers()
    {
        return $this->hasMany($this, 'parent_id')->with('answers');
    }

    
    public function commentable()
    {
        return $this->morphTo();
    }
}
