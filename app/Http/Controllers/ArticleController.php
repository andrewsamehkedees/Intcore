<?php

namespace App\Http\Controllers;

use App\DTO\ArticleDTO;
use Illuminate\Http\Request;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    public function __construct(protected ArticleService $articleService)
    {
    }

    public function store(Request $request)
    {
        $userDTO = ArticleDTO::fromRequest($request);
        $article = $this->articleService->setDto($userDTO)->store();

        return response()->json($article, 201);
    }



    public function activateSwitch($id)
    {
        $article = $this->articleService->setID($id)->activateSwitch();

        return response()->json($article, 200);
    }


    public function destroy($id)
    {
        $article = $this->articleService->setID($id)->destroy();

        return response()->json(null, 204);
    }

    public function show($id)
    {
        $data = $this->articleService->setID($id)->show();

        return response()->json($data, 200);
    }
}
