<?php

namespace App\Jobs;

use App\Notifications\EmailNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    protected $user;

    public function __construct($details,$user)
    {
        $this->details = $details;
        $this->user = $user;
    }


    public function handle()
    {
        $this->user->notify(new EmailNotification($this->details));

    }
}
