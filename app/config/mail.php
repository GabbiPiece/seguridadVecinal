<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Mail Driver
	|--------------------------------------------------------------------------
	|
	| Laravel supports both SMTP and PHP's "mail" function as drivers for the
	| sending of e-mail. You may specify which one you're using throughout
	| your application here. By default, Laravel is setup for SMTP mail.
	|
	| Supported: "smtp", "mail", "sendmail", "mailgun", "mandrill", "log"
	|
	*/

	//'driver' => 'sendmail',
	'driver' => 'smtp',
	/*
	|--------------------------------------------------------------------------
	| SMTP Host Address
	|--------------------------------------------------------------------------
	|
	| Here you may provide the host address of the SMTP server used by your
	| applications. A default option is provided that is compatible with
	| the Mailgun mail service which will provide reliable deliveries.
	|
	*/

	//'host' => 'smtp.gmail.org',
	'host' => 'smtp.gmail.com',

	/*
	|--------------------------------------------------------------------------
	| SMTP Host Port
	|--------------------------------------------------------------------------
	|
	| This is the SMTP port used by your application to deliver e-mails to
	| users of the application. Like the host we have set this value to
	| stay compatible with the Mailgun e-mail application by default.
	|
	*/

	'port' => 587,
	//'port' => 465,

	// esto es para recuperar el password
	'from' => array('address' => 'gabi.carp26@gmail.com', 'name' => 'Administrador del Sistema'),
	
	'encryption' => 'tls',

	/*
	|--------------------------------------------------------------------------
	| SMTP Server Username
	|--------------------------------------------------------------------------
	|
	| If your SMTP server requires a username for authentication, you should
	| set it here. This will get used to authenticate with your server on
	| connection. You may also set the "password" value below this one.
	|
	*/

	'username' => 'gabi.carp26@gmail.com',

	/*
	|--------------------------------------------------------------------------
	| SMTP Server Password
	|--------------------------------------------------------------------------
	|
	| Here you may set the password required by your SMTP server to send out
	| messages from your application. This will be given to the server on
	| connection so that the application will be able to send messages.
	|
	*/

	'password' => 'Cura123Brochero',

	/*
	|--------------------------------------------------------------------------
	| Sendmail System Path
	|--------------------------------------------------------------------------
	|
	| When using the "sendmail" driver to send e-mails, we will need to know
	| the path to where Sendmail lives on this server. A default path has
	| been provided here, which will work well on most of your systems.
	|
	*/

	'sendmail' => '/usr/sbin/sendmail',
	//'sendmail' => '/usr/sbin/sendmail -bs',

	/*
	|--------------------------------------------------------------------------
	| Mail "Pretend"
	|--------------------------------------------------------------------------
	|
	| When this option is enabled, e-mail will not actually be sent over the
	| web and will instead be written to your application's logs files so
	| you may inspect the message. This is great for local development.
	|
	*/

	'pretend' => false,

);
