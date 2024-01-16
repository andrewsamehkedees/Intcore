<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class FavoriteService
{
    private $articleId;

    public function setArticleId($artilceId)
    {
        $this->articleId = $artilceId;
        return $this;
    }
    public function store()
    {
        $user = UserRepository::findByid(auth()->id());
        $user->favoriteArticles()->attach($this->articleId);
        return $user->favoriteArticles;
    }

    public function index()
    {
        $user = UserRepository::findByid(auth()->id());
        return $user->favoriteArticles;
    }
}
