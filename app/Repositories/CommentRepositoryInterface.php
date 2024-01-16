<?php
namespace App\Repositories;

use App\DTO\CommentDTO;

interface CommentRepositoryInterface
{
    public function create(CommentDTO $commentDTO);
    public static function findById($commentId);
}