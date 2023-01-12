<?php

namespace Timedoor\WhatsappOtp;

use Illuminate\Notifications\Notification;
use Netflie\WhatsAppCloudApi\WhatsAppCloudApi;
use Netflie\WhatsAppCloudApi\Response\ResponseException;
use Timedoor\WhatsappOtp\Exceptions\CannotSendOtpException;

class WhatsappChannel
{
    private WhatsAppCloudApi $whatsapp;

    public function __construct(WhatsAppCloudApi $whatsapp)
    {
        $this->whatsapp = $whatsapp;
    }

    /**
     * Send the given OTP notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toWhatsapp($notifiable);

        try {
            $this->whatsapp->sendTemplate(
                $message->getRecipient(),
                $message->getName(),
                $message->getLanguage(),
                $message->getComponent()
            );
        } catch (ResponseException $e) {
            throw CannotSendOtpException::serviceRespondedWithAnError($e);
        }
    }
}