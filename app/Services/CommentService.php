<?php

namespace App\Services;

use App\DTO\CommentDTO;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\UserRepository;

class CommentService
{
    private CommentDTO $dto;

    public function setDto($dto)
    {
        $this->dto = $dto;
        return $this;
    }
    private $commentId;

    public function setCommentId($commentId)
    {
        $this->commentId = $commentId;
        return $this;
    }

    public function __construct(protected CommentRepositoryInterface $commentRepository)
    {
    }
    public function store()
    {
        $userId = auth()->id();
        $user = UserRepository::findByid($userId);
        $article = Article::find($this->dto->getArticleId());

        foreach ($article->author->suspendedUsers as $suspendedUserActual) {
            if ($suspendedUserActual->id == $user->id) {
                return response()->json(['error' => 'You are suspended from commenting on this author\'s articles'], 403);
            }
        }
        return $this->commentRepository->create($this->dto);
    }

    public function delete()
    {
        $userId = auth()->id();
        $comment = CommentRepository::findById($this->commentId);

        if ($comment && $comment->user_id == $userId) {
            $comment->delete();
        }
        return $comment;
    }
}