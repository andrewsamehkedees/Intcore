<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\UserVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendUserVerificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $id;
    protected $user;

    /**
     * Create a new message instance.
     */
    public function __construct($user,$id)
    {
        $this->id = $id;
        $this->user = $user;
    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new UserVerification($this->id));
    }
}
