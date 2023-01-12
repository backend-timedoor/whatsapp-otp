<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Timedoor\WhatsappOtp\Template\ComponentFactory;
use Timedoor\WhatsappOtp\WhatsappChannel;
use Timedoor\WhatsappOtp\WhatsappMessage;

class WhatsappOtpNotification extends Notification
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
        return [WhatsappChannel::class];
    }

    /**
     * Get the whatsapp representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Timedoor\WhatsappOtp\WhatsappMessage
     */
    public function toWhatsapp($notifiable)
    {
        return WhatsappMessage::create()
            ->setRecipient($notifiable->phone_code . $notifiable->phone)
            ->setName(config('whatsapp.otp_template.name'))
            ->setLanguage(config('whatsapp.otp_template.language'))
            ->setHeader()
            ->setBody(ComponentFactory::text($notifiable->token));
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
