<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FeatureService;

class FeatureController extends Controller
{
    public function __construct(protected FeatureService $featureService)
    {
    }
    
    public function store($id)
    {
        $article = $this->featureService->setId($id)->store();

        return response()->json($article, 200);
    }

    public function index()
    {
        $articles = $this->featureService->index();

        return response()->json($articles, 200);
    }
}
