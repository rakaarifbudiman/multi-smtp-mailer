<?php

namespace Govelid\MultiSmtpMailer;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class Installer
{
    /**
     * Install the package.
     *
     * @return void
     */
    public function install()
    {
        $this->moveModel();
    }

    /**
     * Move the MailSetting model to the App/Models directory.
     *
     * @return void
     */
    protected function moveModel()
    {
        $sourcePath = __DIR__ . '/MailSetting.php';
        $destinationPath = app_path('Models/MailSetting.php');

        File::copy($sourcePath, $destinationPath);
    }
}
