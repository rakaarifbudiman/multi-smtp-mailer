<?php

namespace Govelid\MultiSmtpMailer;

use App\Models\MailSetting;
use Config;
use Illuminate\Support\ServiceProvider;

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
        $emailServices = MailSetting::where('active', 1)->get();

        foreach($emailServices as $services)
        {
            $config [$services->mailer]= [
                'transport' => 'smtp',
                'host' => $services->host,
                'port' => $services->port,
                'username' => $services->username,
                'password' => $services->password,
                'encryption' => null,
                'from' => ['address' => $services->from_address, 'name' => $services->from_name],
                'sendmail' => '/usr/sbin/sendmail -bs',
                'pretend' => false,
            ];
        }
        Config::set('mail.mailers', $config);
    }
}
