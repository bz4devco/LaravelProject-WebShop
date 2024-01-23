<?php

namespace App\Models;

use App\Models\Content\Comment;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Nagy\LaravelRating\Traits\CanRate;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\Permissions\HasPermissionsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;
    use Sluggable;
    use HasPermissionsTrait;
    use CanRate;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['first_name', 'last_name']
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
        'slug',
        'email_verified_at',
        'mobile_verified_at',
        'national_code',
        'profile_photo_path',
        'activation',
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


    public function payments()
    {
        return $this->hasMany('App\Models\Payment');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Market\Order');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Market\Product');
    }
    
    
    public function orderItems()
    {
        return $this->hasManyThrough('App\Models\Market\OrderItem', 'App\Models\Market\Order');
    }
    
    
    public function roles()
    {
        return $this->belongsToMany('App\Models\User\Role');
    }
    
    
    public function permissions()
    {
        return $this->belongsToMany('App\Models\User\Permission');
    }


    public function compare()
    {
        return $this->hasOne('App\Models\Market\Compare');
    }



    public function checkNotCompletionProfile()
    {
        if (($this->first_name != null) && ($this->last_name != null) && ($this->mobile != null) && ($this->national_code != null)) {
            return false;
        } else {
            return true;
        }
    }


    public function isUserPurchedProduct($product_id)
    {
        $productIds = collect();
        foreach ($this->orderItems()->where('product_id', $product_id)->get() as $item) {
            $productIds->push($item->product_id);
        }
        $productIds = $productIds->unique();
        return $productIds;
    }

    public function ActivatedUsersEmail()
    {
        return $this->whereNotNull('email')
            ->where('user_type', 0)
            ->where('activation', 1)
            ->whereNotNull('email_verified_at')
            ->pluck('email');
    }

    public function ActivatedUsersMobile()
    {
        return $this->whereNotNull('mobile')
            ->where('user_type', 0)
            ->where('activation', 1)
            ->whereNotNull('mobile_verified_at')
            ->pluck('mobile');
    }
}
