<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(protected CommentService $commentService)
    {
    }
    
    public function store(Request $request)
    {
        return $this->commentService->store($request->comment, $request->articleId);
    }

    public function delete($id)
    {
        return $this->commentService->setCommentId($id)->delete();
    }
}
