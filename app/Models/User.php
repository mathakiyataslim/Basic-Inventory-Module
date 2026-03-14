<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // -----------------old method accessor / mutator -------------

    // public function getEmailAttribute($value){
    //     return ucfirst($value);
    // }

    // public function setNameAttribute($value){
    //     $this->attributes['name'] = strtoupper($value);
    // }
    // public function setEmailAttribute($value){
    //      $this->attributes['email'] = ucwords($value);
    // }

    // -----------------New method accessor / mutator -------------

    public function name(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtolower($value),
        );
    }

    public function email(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),
        );
    }
    protected static function booted()
{
    // model event
    // static::created(function ($user) {
    //     $user->update(['balance' => 100]); 
    // });
}
}
