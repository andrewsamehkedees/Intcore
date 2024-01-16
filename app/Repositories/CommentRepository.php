<?php

namespace App\Repositories;

use App\DTO\CommentDTO;
use App\Models\Comment;
use Illuminate\Support\Facades\Hash;
use App\Repositories\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface
{
    public function create(CommentDTO $commentDTO)
    {
        return Comment::create([
            'user_id' => $commentDTO->getUserId(),
            'article_id' => $commentDTO->getArticleId(),
            'comment' => $commentDTO->getComment(),
        ]);
    }
    public static function findById($commentId)
    {
        return Comment::find($commentId);
    }
}