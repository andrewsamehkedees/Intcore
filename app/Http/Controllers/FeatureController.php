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

        return response()->json(['data' => $article]);
    }

    public function index()
    {
        $articles = $this->featureService->index();

        return response()->json(['data' => $articles]);
    }
}
