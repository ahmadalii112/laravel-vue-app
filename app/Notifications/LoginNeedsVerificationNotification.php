<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Twilio\TwilioChannel;
use NotificationChannels\Twilio\TwilioSmsMessage;

class LoginNeedsVerificationNotification extends Notification
{
    public function __construct()
    {
    }

    public function via($notifiable): array
    {
        return [TwilioChannel::class];
    }

    public function toTwilio($notifiable): TwilioSmsMessage
    {
        // Random code
        $loginCode  = rand(111111, 999999);

        // store it to the user
        $notifiable->update([
            'login_code' => $loginCode
        ]);

        // send to the user
        return (new TwilioSmsMessage())
            ->content("Your Andrewber login code is {$loginCode}, don't share this with anyone!");

//        return (new TwilioSmsMessage())
//            ->content("Your {$notifiable->service} account was approved!");
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
