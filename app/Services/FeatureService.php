<?php

namespace App\Services;

use App\Repositories\ArticleRepository;
use App\Repositories\ArticleRepositoryInterface;

class FeatureService
{
    public function __construct(protected ArticleRepositoryInterface $articleRepository)
    {
    }
    private $id;

    public function setId($Id)
    {
        $this->id = $Id;
        return $this;
    }
    public function store()
    {
        $article = $this->articleRepository->findById($this->id);
        $article->is_featured = true;
        $article->save();

        return $article;
    }

    public function index()
    {
        $articles = ArticleRepository::findFeatured();

        return $articles;
    }
}
