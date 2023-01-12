<?php

namespace Timedoor\WhatsappOtp;

use Illuminate\Support\ServiceProvider;
use Netflie\WhatsAppCloudApi\WhatsAppCloudApi;
use Timedoor\WhatsappOtp\Console\InstallCommand;

class WhatsappOtpServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/whatsapp.php',
            'whatsapp'
        );

        $this->app
             ->when(WhatsappChannel::class)
             ->needs(WhatsAppCloudApi::class)
             ->give(static function () {
                return new WhatsAppCloudApi(config('whatsapp'));
             });
    }

    /**
     * Bootstrap services
     * 
     * @return void
     */
    public function boot() 
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/whatsapp.php' => config_path('whatsapp.php')
            ], 'whatsapp');

            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}