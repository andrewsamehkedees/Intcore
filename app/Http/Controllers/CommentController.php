<?php

namespace App\Http\Controllers;

use App\DTO\CommentDTO;
use Illuminate\Http\Request;
use App\Services\CommentService;

class CommentController extends Controller
{
    public function __construct(protected CommentService $commentService)
    {
    }
    
    public function store(Request $request, $id)
    {
        $commentDTO = CommentDTO::fromRequest($request);
        $commentDTO->setArticleId($id);
        $comment = $this->commentService->setDto($commentDTO)->store();
        return response()->json(['data' => $comment]);
    }

    public function delete($id)
    {
        $this->commentService->setCommentId($id)->delete();
        return response()->json(['data' => null]);
    }
}
