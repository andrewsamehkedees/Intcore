<?php

namespace App\Repositories;

use App\Models\Author;
use App\DTO\AuthorDTO;
use Illuminate\Support\Facades\Hash;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function create(AuthorDTO $authorDTO, string|null $imageName)
    {
        return Author::create([
            'name' => $authorDTO->getName(),
            'email' => $authorDTO->getEmail(),
            'password' => Hash::make($authorDTO->getPassword()),
            'image' => $imageName,
        ]);
    }
    public function findByEmail($email)
    {
        return Author::where('email', $email)->first();
    }
    public static function findByid($id)
    {
        return Author::find($id);
    }
}
