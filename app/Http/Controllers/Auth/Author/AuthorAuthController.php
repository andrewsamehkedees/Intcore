<?php

namespace App\Http\Controllers\Auth\Author;

use App\DTO\AuthorDTO;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Services\AuthorAuthService;
use App\Http\Controllers\Controller;
use App\Repositories\AuthorRepository;

class AuthorAuthController extends Controller
{
    public function __construct(protected AuthorAuthService $authorAuthService)
    {
    }
    
    public function register(Request $request)
    {
        $authorDTO = AuthorDTO::fromRequest($request);

        $authorSer =  $this->authorAuthService->setDto($authorDTO)->handle();

        return $authorSer;
    }

    public function login(Request $request)
    {
        $authorDTO = AuthorDTO::fromRequest($request);
        return $this->authorAuthService->setDto($authorDTO)->login();
    }
    
    public function verifyEmail(Request $request)
    {
        $id = $request->get('id');
        $author = AuthorRepository::findByid($id);

        if ($author) {
            $author->is_verified = true;
            $author->save();

            return response()->json(['message' => 'Email verified successfully'], 200);
        } else {
            return response()->json(['message' => 'Invalid verification token'], 400);
        }
    }
}
