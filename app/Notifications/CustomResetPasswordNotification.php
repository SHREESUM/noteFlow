<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomResetPasswordNotification extends Notification
{
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->email,
        ], false));

        return (new MailMessage)
            ->subject('Reset Your noteFlow Password')
            ->greeting('Hello!')
            ->line('We received a request to reset your noteFlow account password.')
            ->action('Reset Password', $url)
            ->line('If you didn\'t request this change, you can safely ignore this email.')
            ->salutation('Regards, noteFlow Team');
    }
}