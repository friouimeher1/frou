<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Produit;

class Stock extends Notification
{
  use Queueable;

/**
 * Create a new notification instance.
 *
 * @return void
 */
 protected $produit;

/**
 * Create a new notification instance.
 *
 * @param $token
 */
public function __construct(Produit $produit)
{
    $this->produit = $produit;
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
        'message' => 'Stock!!.',
        'id' => $this->produit->id,
    ];
}
}
