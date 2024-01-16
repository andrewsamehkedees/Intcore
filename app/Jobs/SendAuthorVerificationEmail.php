<?php

namespace App\Jobs;

use App\Mail\AuthorVerification;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendAuthorVerificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $id;
    protected $author;
    /**
     * Create a new job instance.
     */
    public function __construct($author,$id)
    {
        $this->id = $id;
        $this->author = $author;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->author->email)->send(new AuthorVerification($this->id));
    }
}
