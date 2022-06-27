<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class UserVerifyNotification extends VerifyEmail implements ShouldQueue
{
    use Queueable;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $actionUrl = $this->verificationUrl($notifiable);
        $actionText = 'click here to verify your email';
        $name = $this->user->name;
        return (new MailMessage)
            ->subject('verify your account')->view(
                'emails.user-verify', compact('actionUrl', 'actionText', 'name')
            );
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
