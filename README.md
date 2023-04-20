# multi-smtp-mailer
<p> composer require govelid/multi-smtp-mailer</p>
<p>This package allow you set multiple smtp mailer dynamically from database, it is more secure than you have to set your credentials mail at your config or .env file</p>

# Installation
<ul>
  <li>1. You need setup your database </li>  
  <li>2. Run <code>composer require govelid/multi-smtp-mailer</code></li>
  <li>3. Modify the composer.json file in your Laravel app by adding the following lines to the autoload section:
  <code>"psr-4": {
    "App\\": "app/",
    "Govelid\\MultiSmtpMailer\\": "vendor/govelid/multi-smtp-mailer/src/"
}</code>
</li>
<li>4. Run <code>composer dump-autoload</code></li>
  <li>5. Publish the migration file : <br>
    <code>php artisan vendor:publish --provider="Govelid\MultiSmtpMailer\MailConfigServiceProvider"</code></li>
  <li>6. Run <code>php artisan migrate</code></li>
  <li>7. Create new data mailer at mail_settings table , for first mail default mailer is 'smtp' , the next mailer you can give custom name</li>
  <li>8. Tes your mail</li>  
</ul>

# How to use mail
<ul>
  <li>Default mailer : Mail::to($recipient)->send(new Mail)</li>    
  <li>Custom mailer : Mail::mailer('custommailer)->to($recipient)->send(new Mail)</li>    
</ul>

# How to use MailSetting Model
<ul>
  <li>Use as is Laravel Eloquent Model , example display all data form table mail_settings: <code>MailSetting::all();</code></li>    
  <li>Dont forget to add <code>use Govelid\MultiSmtpMailer\MailSetting;</code></li>    
</ul>

