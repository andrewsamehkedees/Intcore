<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'article_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
