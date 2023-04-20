<?php

namespace Govelid\MultiSmtpMailer;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;

class MailConfigServiceProvider extends ServiceProvider
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
        \Artisan::call('db:seed --class=WOSeeder');          
    }
}
