<?php

namespace App\Models;

use App\Models\Content\Comment;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' =>[
                'source' => ['first_name' , 'last_name']
            ]
        ];
    } 

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'email_verified_at',
        'mobile_verified_at',
        'national_code',
        'profile_photo_path',
        'actiovation',
        'user_type',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }


    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket\Ticket', 'user_id');
    }

    public function ticketFiles()
    {
        return $this->hasMany('App\Models\Ticket\TicketFile', 'user_id');
    }

    public function ticketAdmin()
    {
        return $this->hasOne('App\Models\Ticket\TicketAdmin', 'user_id');
    }


    public function roles() {
        return $this->belongsToMany('App\Models\User\Role');
    }

    public function payments()
    {
        return $this->hasMany('App\Models\Payment');
    }
}
