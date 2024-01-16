<?php

namespace App\Services;


class ImageService
{
    public static function setImage($image)
    {
        $imageName = null;
        if ($image != null) {
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            return $imageName;
        }
        return $imageName;
    }
}