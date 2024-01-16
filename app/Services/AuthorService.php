<?php

namespace App\Services;

use App\Models\User;
use App\Models\Author;
use App\Models\Suspend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendAuthorVerificationEmail;
use Illuminate\Validation\ValidationException;

class AuthorService
{
    private $id;

    public function setID($id)
    {
        $this->id = $id;
        return $this;
    }
    public function suspendUser()
    {
        $suspend = Suspend::create([
            'user_id' => $this->id,
            'author_id' => auth()->id(),
        ]);
        return $suspend;
    }
}