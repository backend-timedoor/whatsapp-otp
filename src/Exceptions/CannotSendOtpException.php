<?php

namespace Timedoor\WhatsappOtp\Exceptions;

use Netflie\WhatsAppCloudApi\Response\ResponseException;

class CannotSendOtpException extends \Exception
{
    /**
     * Respond with error message from whatsapp API
     * 
     * @return self
     */
    public static function serviceRespondedWithAnError(ResponseException $exception)
    {
        return new static(
            $exception->getMessage(),
            $exception->getCode(),
            $exception
        );
    }
}