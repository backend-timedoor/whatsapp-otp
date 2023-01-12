<?php

return [
    /**
     * Specify Whatsapp Business API access token
     */
    'access_token' => env('WHATSAPP_ACCESS_TOKEN'),

    /**
     * Specify Whatsapp Business API Phone ID
     */
    'from_phone_number_id'     => env('WHATSAPP_PHONE_ID'),
    
    /**
     * Specify API version
     */
    'graph_version'      => 'v15.0',

    /**
     * Specify Whatsapp Business template used for OTP message
     * To create a Whatsapp Business template please refer to:
     * https://www.facebook.com/business/help/2055875911147364?id=2129163877102343
     */
    'otp_template' => [
        /**
         * Specify the name of OTP Whatsapp template.
         * Template name must not be empty because the template will be used as default OTP message. 
         */
        'name'      => env('WHATSAPP_TEMPLATE_NAME'),

        /**
         * Specify the default language of template that is already set. 
         */
        'language'  => env('WHATSAPP_TEMPLATE_LANG', 'en_US'),
    ],
];
