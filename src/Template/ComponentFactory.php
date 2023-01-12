<?php

namespace Timedoor\WhatsappOtp\Template;

use Timedoor\WhatsappOtp\Template\Components\Text;

class ComponentFactory
{
    public static function text(string $text) : Text
    {
        return new Text($text);
    }
}