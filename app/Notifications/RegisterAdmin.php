<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Admin;
class RegisterAdmin extends Notification
{

        use Queueable;

      /**
       * Create a new notification instance.
       *
       * @return void
       */
       protected $admin;

      /**
       * Create a new notification instance.
       *
       * @param $token
       */
      public function __construct(Admin $admin)
      {
          $this->admin = $admin;
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
              'id' => $this->admin->id,
              'name' => $this->admin->name,
          ];
      }
}
