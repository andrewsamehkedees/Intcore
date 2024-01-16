<?php
namespace App\DTO;

use Illuminate\Http\Request;

class UserDTO
{
    private $name;
    private $email;
    private $password;
    private $image;

    public function __construct($name,$email,$password,$image)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->image = $image;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getImage()
    {
        return $this->image;
    }
    public static function fromRequest(Request $request) {
        return new self(
            $request->input('name'),
            $request->input('email'),
            $request->input('password'),
            $request->input('image')
        );
    }
}
