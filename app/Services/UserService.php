<?php

namespace App\Services;

use App\Models\User;
use App\Models\Author;
use App\Models\Article;
use App\Repositories\ArticleRepository;

class UserService
{
    private $id;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    public function showAuthors()
    {
        return Author::all();
    }

    public function showArticlesForAuthor()
    {
        return ArticleRepository::findByAuthorId($this->id);
    }

}