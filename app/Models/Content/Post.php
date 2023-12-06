<?php

namespace App\Models\Content;

use App\Models\Content\PostCategory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $casts = ['image' => 'array'];


    public function sluggable(): array
    {
        return [
            'slug' =>[
                'source' => 'title'
            ]
        ];
    } 

    protected $fillable = [
        'title', 'summery', 'body', 'image', 'status', 'commentable', 'published_at', 'author_id', 'category_id', 'tags', 'sort'
    ];

    
    // Relationship between Posts from PostCategory 
    public function postCategory()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }
}
