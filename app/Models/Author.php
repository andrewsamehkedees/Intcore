<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Author extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'is_verified', 'image'];
    protected $hidden = ['password','is_verified'];
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function suspendedUsers()
    {
        return $this->belongsToMany(User::class, 'suspends');
    }
}

