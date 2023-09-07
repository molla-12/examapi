<?php

namespace App\Listeners;

use App\Events\NewPostPublished;
use App\Mail\PostNotificationEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPostNotificationEmail implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(NewPostPublished $event)
    {
        $post = $event->post;
        $subscribers = $post->website->subscribers;

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new PostNotificationEmail($post));
        }
    }
}
