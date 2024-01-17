<?php
namespace App\Repositories;

use App\DTO\UserDTO;

interface UserRepositoryInterface
{
    public function create(UserDTO $userDTO,string|null $imageName);
    public function findByEmail(string $email);
    public static function findByid($id);

}