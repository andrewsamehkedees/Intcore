<?php
namespace App\Repositories;

use App\DTO\ArticleDTO;

interface ArticleRepositoryInterface
{
    public function create(ArticleDTO $articleDTO,string|null $imageName);
    public function update(ArticleDTO $articleDTO, string|null $imageName,$id);
    public function findById(string $id);
    public static function findFeatured();
    public static function findByAuthorId($id);
}