<?php
namespace App\DTO;

use Illuminate\Http\Request;

class CommentDTO
{
    private $userId;
    private $articleId;
    private $comment;

    public function __construct($userId,$articleId,$comment)
    {
        $this->userId = $userId;
        $this->articleId = $articleId;
        $this->comment = $comment;
    }
    
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;
    }

    public function setPassword($comment)
    {
        $this->comment = $comment;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getArticleId()
    {
        return $this->articleId;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public static function fromRequest(Request $request) {
        return new self(
            $request->input('userId'),
            $request->input('articleId'),
            $request->input('comment'),
        );
    }
}
