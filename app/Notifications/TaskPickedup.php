<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class TaskPickedup extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    public function toSlack($notifiable)
    {
        $inAppLink = url("/");
        $name = $notifiable->owner->name;

        return (new SlackMessage)
                ->to("@$name")
                ->content(":dart: You picked up $notifiable->task.")
                ->attachment(function ($attachment) use ($notifiable, $inAppLink) {
                    $attachment->title("$notifiable->task", "$inAppLink/post/$notifiable->id")
                                ->content("$notifiable->comment")
                                ->fields([
                                    '' => "for $notifiable->site - $notifiable->points Points.",
                                ]);
                });
    }
}
