<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_verified',
        'image',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favoriteArticles()
    {
        return $this->belongsToMany(Article::class, 'favorite');
    }
    public function suspendedByAuthors()
    {
        return $this->belongsToMany(Author::class, 'suspends');
    }
}
