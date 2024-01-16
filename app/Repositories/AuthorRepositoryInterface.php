<?php
namespace App\Repositories;

use App\DTO\AuthorDTO;

interface AuthorRepositoryInterface
{
    public function create(AuthorDTO $authorDTO, string $imageName);
    public function findByEmail(string $email);
    public static function findByid($id);

}