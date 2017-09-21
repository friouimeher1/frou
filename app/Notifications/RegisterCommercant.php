<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Commercant;
class RegisterCommercant extends Notification
{
    




      use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
     protected $commercant;

    /**
     * Create a new notification instance.
     *
     * @param $token
     */
    public function __construct(Commercant $commercant)
    {
        $this->commercant = $commercant;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'A new user was added on Laravel News.',
            'id' => $this->commercant->id,
            'name' => $this->commercant->name,
        ];
    }
}
