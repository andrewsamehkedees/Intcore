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
        $comment = $this->commentService->store($request->comment, $request->articleId);
        return response()->json(['data' => $comment]);
    }

    public function delete($id)
    {
        $this->commentService->setCommentId($id)->delete();
        return response()->json(['data' => null]);
    }
}
