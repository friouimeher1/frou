<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;
class Register extends Notification
{




      use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
     protected $user;

    /**
     * Create a new notification instance.
     *
     * @param $token
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
            'id' => $this->user->id,
            'name' => $this->user->name,
        ];
    }



}
