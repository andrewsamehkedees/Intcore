<?php

namespace App\Services;

use App\DTO\ArticleDTO;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ArticleRepositoryInterface;

class ArticleService
{
    private ArticleDTO $dto;

    public function setDto($dto)
    {
        $this->dto = $dto;
        return $this;
    }
    private $id;

    public function setID($id)
    {
        $this->id = $id;
        return $this;
    }

    public function __construct(protected ArticleRepositoryInterface $articleRepository)
    {
    }
    public function store()
    {
        $imageName = ImageService::setImage($this->dto->getImage());
        $this->dto->setAuthorId(auth()->id());
        $article = $this->articleRepository->create($this->dto, $imageName);

        return $article;
    }
    public function update($id)
    {
        $imageName = ImageService::setImage($this->dto->getImage());
        $this->dto->setAuthorId(auth()->id());
        $article = $this->articleRepository->create($this->dto, $imageName,$id);

        return $article;
    }

    public function activateSwitch()
    {
        $article = $this->articleRepository->findById($this->id);
        $article->status = !$article->status;
        $article->save();

        return $article;
    }

    public function destroy()
    {
        $article = $this->articleRepository->findById($this->id);

        if ($article->comments()->count() == 0) {
            $article->delete();
        }

        return $article;
    }

    public function show()
    {
        $article = $this->articleRepository->findById($this->id);
        $comments = $article->comments()->with('user')->get();

        return ['article' => $article, 'comments' => $comments];
    }
}
