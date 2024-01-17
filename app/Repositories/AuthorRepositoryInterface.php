<?php
namespace App\Repositories;

use App\DTO\AuthorDTO;

interface AuthorRepositoryInterface
{
    public function create(AuthorDTO $authorDTO, string|null $imageName);
    public function findByEmail(string $email);
    public static function findByid($id);

}