<?php
use App\Notifications\EmailNotification;
use Carbon\Carbon;

function sendEmail($user,$data){
    $project = [
        'greeting' =>$data->greeting,
        'body' => $data->body,
        'thanks' => $data->thanks,
        'actionText' =>$data->actionText,
        'actionURL' => $data->url,
        'id' => $data->id
    ];

    Notification::send($user, new EmailNotification($project));
    // $user->notify(new EmailNotification($project));

}
