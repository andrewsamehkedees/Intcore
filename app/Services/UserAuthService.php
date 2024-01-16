<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendUserVerificationEmail;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Validation\ValidationException;

class UserAuthService
{
    private UserDTO $dto;

    public function setDto($dto)
    {
        $this->dto = $dto;
        return $this;
    }

    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    public function handle()
    {
        $imageName = ImageService::setImage($this->dto->getImage());

        $user = $this->userRepository->create($this->dto, $imageName);

        dispatch(new SendUserVerificationEmail($user, $user->id));

        return $user;
    }

    public function login()
    {
        $user = $this->userRepository->findByEmail($this->dto->getEmail());
        if (!$user || !Hash::check($this->dto->getPassword(), $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'access_token' => $user->createToken('auth_token')->plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }
}
