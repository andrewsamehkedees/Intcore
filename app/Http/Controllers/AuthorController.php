<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Services\AuthorService;

class AuthorController extends Controller
{

    public function __construct(protected AuthorService $authorService)
    {
    }

    public function suspendUser($id)
    {
        $this->authorService->setID($id)->suspendUser();
        return response()->json(['message' => 'User has been suspended.']);
    }
}
