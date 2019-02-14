<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
class ResetPassword extends Notification
{
  use Queueable;

  /**
  * Create a new notification instance.
  *
  * @return void
  */
  public function __construct($token)
  {
      $this->token = $token;
  }

  /**
  * Get the notification's delivery channels.
  *
  * @param  mixed  $notifiable
  * @return array
  */
  public function via($notifiable)
  {
    return ['mail'];
  }

  /**
  * Get the mail representation of the notification.
  *
  * @param  mixed  $notifiable
  * @return \Illuminate\Notifications\Messages\MailMessage
  */
  public function toMail($notifiable)
  {

    return (new MailMessage)
    ->greeting('Bienvenido a LockSEK')
    ->line('Este mensaje es para reiniciar la contraseña.')
    ->action('Reiniciar contraseña', url(config('app.url').route('password.reset', $this->token, false)))
    ->line('Si no ha pedido un reinicio de contraseña por favor ignore este mensaje!');
  }

  /**
  * Get the array representation of the notification.
  *
  * @param  mixed  $notifiable
  * @return array
  */
  public function toArray($notifiable)
  {
    return [
      //
    ];
  }
}
