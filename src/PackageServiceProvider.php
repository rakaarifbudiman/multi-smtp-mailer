<?php

namespace Govelid\MultiSmtpMailer;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('mailsetting', function () {
            return new \Govelid\MultiSmtpMailer\MailSetting();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->publishes([
            __DIR__.'/database/migrations/' => database_path('migrations')
        ], 'migrations');
        \Artisan::call('migrate --path=/database/migrations/create_mail_settings_table.php');        
    }
}
