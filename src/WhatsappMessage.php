<?php

namespace Timedoor\WhatsappOtp;

use Timedoor\WhatsappOtp\Template\Component;
use Netflie\WhatsAppCloudApi\Message\Template\Component as WhatsappComponent;

class WhatsappMessage
{
    protected string $to;
    protected string $name;
    protected string $lang;
    protected array $components;

    protected function __construct($to = '', $name = '', $lang = 'en_US')
    {
        $this->to = $to;
        $this->name = $name;
        $this->lang = $lang;
        $this->components = [
            'header' => [],
            'body'   => [],
        ];
    }

    /**
     * Create whatsapp message
     * 
     * @return self
     */
    public static function create(string $to = '', string $name = '', string $lang = 'en_US') : self
    {
        return new self($to, $name, $lang);
    }

    /**
     * Set message recipient
     * 
     * @param string $to
     * @return self
     */
    public function setRecipient($to) : self
    {
        $this->to = $to;

        return $this;
    }

     /**
     * Set message template name
     * 
     * @param string $name
     * @return self
     */
    public function setName($name) : self
    {
        $this->name = $name;

        return $this;
    }

     /**
     * Set message template language
     * 
     * @param string $lang
     * @return self
     */
    public function setLanguage($lang) : self
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Set message template component header
     * 
     * @param Component|null $component
     * @return self
     */
    public function setHeader(Component $component = null) : self
    {
        $this->components['header'][] = $component ? $component->toArray() : null;

        return $this;
    }

    /**
     * Set message template component body
     * 
     * @param Component|null $component
     * @return self
     */
    public function setBody(Component $component) : self
    {
        $this->components['body'][] = $component->toArray();

        return $this;
    }

    /**
     * Get recipient number
     * 
     * @return string
     */
    public function getRecipient() : string
    {
        return $this->to;
    }

    /**
     * Get template name
     * 
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Get template language
     * 
     * @return string
     */
    public function getLanguage() : ?string
    {
        return $this->lang;
    }

    /**
     * Get template component
     * 
     * @return WhatsappComponent
     */
    public function getComponent() : WhatsappComponent
    {
        return new WhatsappComponent(
            $this->components['header'],
            $this->components['body'],
        );
    }
}
