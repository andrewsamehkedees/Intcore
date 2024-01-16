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
        return $this->userService->showAuthors();
    }

    public function showArticlesForAuthor(string $id)
    {
        return $this->userService->setId($id)->showArticlesForAuthor();
    }

    
}
