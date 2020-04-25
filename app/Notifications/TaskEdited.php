<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class TaskEdited extends Notification
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
        $editor = $notifiable->edited->slack_id;
        $inAppLink = url("/");
        $name = $notifiable->owner->name;

        return (new SlackMessage)
                ->to("@Ciaran") //Change to @name in the live version
                ->warning()
                ->content(":writing_hand: <@$editor> is editing *$notifiable->task* for you.")
                ->attachment(function ($attachment) use ($notifiable, $inAppLink) {
                    $attachment->title("$notifiable->task", "$inAppLink/post/$notifiable->id")
                                ->fields([
                                    '' => "for $notifiable->site",
                                ]);
                });
    }

}
