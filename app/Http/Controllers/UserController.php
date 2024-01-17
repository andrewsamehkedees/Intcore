<?php

namespace App\Http\Controllers;


use App\Models\User;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function showAuthors()
    {
        $authors = $this->userService->showAuthors();
        return response()->json(['data' => $authors]);
    }

    public function showArticlesForAuthor(string $id)
    {
        $articles = $this->userService->setId($id)->showArticlesForAuthor();
        return response()->json(['data' => $articles]);
    }

    
}
