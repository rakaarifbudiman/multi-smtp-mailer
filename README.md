# multi-smtp-mailer
<p> composer require govelid/multi-smtp-mailer</p>
<p>This package allow you set multiple smtp mailer dynamically from database</p>
<ul>
  <li>1. You need setup your database </li>  
  <li>2. Run composer require govelid/multi-smtp-mailer </li>
  <li>3. Manually make migration , copy code from vendor\govelid\multi-smtp-mailer\src\create_mail_settings_table.php</li>
  <li>4. Run php artisan migrate</li>
  <li>5. Create new data mailer at mail_settings table , for first mail default mailer is 'smtp' , the next mailer you can give custom name</li>
  <li>6. Tes your mail</li>  
</ul>

How to use mail
<ul>
  <li>Default mailer : Mail::to($recipient)->send(new Mail)</li>    
  <li>Custom mailer : Mail::mailer('custommailer)->to($recipient)->send(new Mail)</li>    
</ul>

