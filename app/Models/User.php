<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
   // use SoftDeletes;
    use HasFilter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function buildings() {
        return $this->belongsToMany(Building::class);
    }

    public function dinos() {
        return $this->belongsToMany(Dino::class);
    }

    public function dinosInCart() {
        return $this->belongsToMany(Dino::class)->wherePivot('order_id',  null);
    }

    public function orderDinos(Order $order) {
        return $this->belongsToMany(Dino::class)->wherePivot('order_id',  $order->id);
    }


    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function promocodes() {
        return $this->hasMany(Promocode::class);
    }

    public function profile() {
        return $this->hasOne(Profile::class);
    }

    public function getFormatNameAttribute()
    {
        return $this->name;
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getIsAdminAttribute()
    {
        return $this->roles->pluck('title')->contains('admin');
    }

}
