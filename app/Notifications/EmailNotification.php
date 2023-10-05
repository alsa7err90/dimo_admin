<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotification extends Notification implements ShouldQueue
{
    use Queueable;
    protected $project;


    public function __construct($project)
    {
        $this->project = $project;
    }


    public function via($notifiable)
    {
        return ['mail','database'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting($this->project['greeting'])
                    ->line($this->project['body'])
                    ->action($this->project['actionText'], $this->project['actionURL'])
                    ->line($this->project['thanks']);
    }

    public function toDatabase($notifiable)
    {
        return [
            'project_id' => $this->project['id']
        ];
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
