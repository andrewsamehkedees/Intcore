<?php

namespace App\Http\Controllers\Auth;

use App\DTO\UserDTO;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserAuthService;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class UserAuthController extends Controller
{
    public function __construct(protected UserAuthService $userAuthService)
    {
    }

    public function register(Request $request)
    {
        $userDTO = UserDTO::fromRequest($request);

        $userSer =  $this->userAuthService->setDto($userDTO)->handle();

        return response()->json(['data' => $userSer]);

    }

    public function login(Request $request)
    {
        $userDTO = UserDTO::fromRequest($request);
        $login = $this->userAuthService->setDto($userDTO)->login();
        return response()->json(['data' => $login]);

    }

    public function verifyEmail(Request $request)
    {
        $id = $request->get('id');
        $user = UserRepository::findByid($id);

        if ($user) {
            $user->is_verified = true;
            $user->save();

            return response()->json(['message' => 'Email verified successfully'], 200);
        } else {
            return response()->json(['message' => 'Invalid verification token'], 400);
        }
    }
}
