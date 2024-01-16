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
        return $this->favoriteService->setArticleId($id)->store();
    }

    public function index()
    {
        return $this->favoriteService->index();
    }
}
