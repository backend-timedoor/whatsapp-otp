# whatsapp-otp
This package is used to send WhatsApp OTP notification using WhatsApp Cloud API on Laravel. 

## Installation
Install package via composer
```
composer require timedoor/whatsapp-otp
```

Install config and notification file for WhatsApp OTP
```
php artisan whatsapp-otp:install
```

### Set Up WhatsApp Cloud API 
This package requires a Meta developer account and a Meta developer app to start sending message with WhatsApp. To set up Meta developer app follow the instructions as described in WhatsApp Cloud API [documentation](https://developers.facebook.com/docs/whatsapp/cloud-api/get-started#set-up-developer-assets). 

### Create WhatsApp Template
WhatsApp API only allows you to start conversation by sending a template message. In order to send an OTP notfication, you must make a WhatsApp template first. You can take a look at the WhatsApp Template [documentation](https://developers.facebook.com/docs/whatsapp/message-templates/creation/) page for more details. 

For multi language template, you can create separate templates for different languages with the same template name.

### Configure WhatsApp Cloud API 
Copy the access token and phone number ID from Whatsapp app dashboard. 

Then place your access token, phone number ID, template name, and template language in the `.env` file as below.

```
WHATSAPP_ACCESS_TOKEN=
WHATSAPP_PHONE_ID=
WHATSAPP_TEMPLATE_NAME=
WHATSAPP_TEMPLATE_LANG=
```
The config settings of WhatsApp API can be seen on `config/whatsapp.php` file.

## Usage
This package comes with notification class `WhatsappOtpNotification` that is stored in `app/Notifications` folder. 

To send OTP notification you can use `notify` method provided by `Notifiable` trait like the example below.
```
$notification = new WhatsappOtpNotification();
$event->otp->notify($notification);
```