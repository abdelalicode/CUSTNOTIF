<?php

namespace App\Notifications;

use App\Models\AdminNotification;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Custnotif extends Notification
{
    use Queueable;

    protected $adminnotification;
    protected $notificationgroup;

    /**
     * Create a new notification instance.
     */
    public function __construct(AdminNotification $adminnotification)
    {
        $this->adminnotification = $adminnotification;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        $via = [];

        $collection = $notifiable->adminNotifications()->where('admin_notification_id', $this->adminnotification->id)->first();

        if ($collection)
        {
            if ($collection->pivot->push_enabled)
            {
                $via = ['broadcast', 'database'];
            }
            if ($collection->pivot->email_enabled)
            {
                $via[] = 'mail';
            }
        }
        // if($notifiable->boolean)
        // {
        //     $via[] = 'broadcast';
        // }
        // if($notifiable->boolean2)
        // {
        //     $via[] = 'email';
        // }
        return $via;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $message= new MailMessage;

        $message->subject($this->adminnotification->emailTemplate->subject)
                ->from('info@custplace.com')
                ->line($this->adminnotification->emailTemplate->body)
                ->action('Please visit this link for more', url('/'))
                ->line('Thank you for using our application!');

        return $message;
    }


    public function toDatabase(object $notifiable)
    {
        return [
            'title' => $this->adminnotification->pushTemplate->title,
            'content' => $this->adminnotification->pushTemplate->content,
            'icon' => '',
            'url' => '',
        ];
    }

    public function toBroadcast(object $notifiable)
    {
        return new BroadcastMessage([
            'title' => $this->adminnotification->pushTemplate->title,
           'content' => $this->adminnotification->pushTemplate->content
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
