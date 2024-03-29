<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'phone_number',
        'address'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function cart(){
        return $this->hasOne(Cart::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
