<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'settings';

    protected $casts = [
        'logo' => 'array',
        'icon' => 'array',
    ];


    protected $fillable = [
        'title', 'description', 'base_url', 'keywords', 'telegram', 'instagram', 'twitter', 'linkedin', 'google_plus', 'tel', 'email', 'address', 'icon', 'logo', 'google_map', 'status'
    ];
}
