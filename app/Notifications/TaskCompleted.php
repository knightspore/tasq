<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class TaskCompleted extends Notification
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

        $url = $notifiable->live;
        $name = $notifiable->owner->name;
        $editor = $notifiable->edited->name;
        $inAppLink = url('/');

        // dd($notifiable);
        return (new SlackMessage)
                ->success()
                ->content(":heavy_check_mark: $name completed a task.")
                ->attachment(function ($attachment) use ($notifiable, $editor, $inAppLink) {
                    $attachment->title("$notifiable->task", "$inAppLink/post/$notifiable->id")
                                ->content("$notifiable->comment")
                                ->fields([
                                    'Site' => "$notifiable->site",
                                    'Info' => "$notifiable->type, $notifiable->points Points",
                                    'Edited by' => "$editor",
                                    'Links' => "<$notifiable->folder|📁> - <$notifiable->live|🔗>",
                                ]);
                });

    }
}
