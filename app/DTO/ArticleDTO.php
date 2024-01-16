<?php

namespace App\DTO;

use Illuminate\Http\Request;

class ArticleDTO
{
    private $title;
    private $authorid;
    private $description;
    private $image;
    private $categorie;
    public function __construct($title, $authorid, $description, $image,$categorie)
    {
        $this->title = $title;
        $this->authorid = $authorid;
        $this->description = $description;
        $this->image = $image;
        $this->categorie = $categorie;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setAuthorId($authorid)
    {
        $this->authorid = $authorid;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthorId()
    {
        return $this->authorid;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImage()
    {
        return $this->image;
    }
    public function getCategorie()
    {
        return $this->categorie;
    }
    public static function fromRequest(Request $request)
    {
        return new self(
            $request->input('title'),
            $request->input('authorid'),
            $request->input('description'),
            $request->input('image'),
            $request->input('categorie')
        );
    }
}
