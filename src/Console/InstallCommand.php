<?php

namespace Timedoor\WhatsappOtp\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'whatsapp-otp:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Whatsapp Otp';

    public function handle()
    {
        $this->info('Installing Whatsapp OTP notification...');
        $this->installNotifications();

        $this->info('Publishing Whatsapp OTP config...');
        $this->installConfig();
        
        $this->info('Installed Whatsapp OTP');
    }

    private function installNotifications()
    {
        (new Filesystem)->ensureDirectoryExists(app_path('Notifications'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/Notifications', app_path('Notifications'));
    }

    private function installConfig()
    {
        $params = [
            '--tag' => 'whatsapp'
        ];
        
        $this->call('vendor:publish', $params);
    }
}