<?php

namespace App\Http\Controllers;

use App\Services\FavoriteService;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct(protected FavoriteService $favoriteService)
    {
    }
    
    public function store($id)
    {
        $favorite = $this->favoriteService->setArticleId($id)->store();
        return response()->json(['data' => $favorite]);

    }

    public function index()
    {
        $favorites = $this->favoriteService->index();
        return response()->json(['data' => $favorites]);

    }
}
