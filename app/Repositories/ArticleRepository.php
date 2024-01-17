<?php

namespace App\Repositories;

use App\Models\Article;
use App\DTO\ArticleDTO;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function create(ArticleDTO $articleDTO,string|null $imageName)
    {
        $article = Article::create([
            'title' => $articleDTO->getTitle(),
            'author_id' => $articleDTO->getAuthorId(),
            'description' => $articleDTO->getDescription(),
            'image' => $imageName,
        ]);
        $article->save();
        $article->categories()->attach($articleDTO->getCategorie());
        return $article;
    }
    public function findById($id)
    {
        return Article::find($id);
    }
    public static function findFeatured()
    {
        return Article::where('is_featured', true)->get();
    }
    public static function findByAuthorId($id)
    {
        return Article::where('author_id', $id)->get();
    }

}
