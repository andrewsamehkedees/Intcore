<?php

namespace App\Repositories;

use App\DTO\UserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function create(UserDTO $userDTO,string|null $imageName)
    {
        return User::create([
            'name' => $userDTO->getName(),
            'email' => $userDTO->getEmail(),
            'password' => Hash::make($userDTO->getPassword()),
            'image' => $imageName,
        ]);
    }
    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }
    public static function findByid($id)
    {
        return User::find($id);
    }
}
