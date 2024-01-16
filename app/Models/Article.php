<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    // protected $table = 'articlecategory';
    protected $fillable = ['title', 'author_id', 'description', 'image', 'status', 'is_featured'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'articlecategory');
    }

    public function favoriteUsers()
    {
        return $this->belongsToMany(User::class, 'favorite');
    }
 
}
