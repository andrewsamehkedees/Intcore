<?php

namespace App\Services;

use App\DTO\AuthorDTO;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendAuthorVerificationEmail;
use Illuminate\Validation\ValidationException;
use App\Repositories\AuthorRepositoryInterface;

class AuthorAuthService
{
    private AuthorDTO $dto;

    public function setDto($dto)
    {
        $this->dto = $dto;
        return $this;
    }

    public function __construct(protected AuthorRepositoryInterface $authorRepository)
    {
    }


    public function handle()
    {
        $imageName = ImageService::setImage($this->dto->getImage());

        $user = $this->authorRepository->create($this->dto, $imageName);

        dispatch(new SendAuthorVerificationEmail($user, $user->id));
    }

    public function login()
    {
        $author = $this->authorRepository->findByEmail($this->dto->getEmail());

        if (!$author || !Hash::check($this->dto->getPassword(), $author->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'access_token' => $author->createToken('auth_token')->plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }
}
