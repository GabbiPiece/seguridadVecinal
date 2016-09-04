<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Recuperar su contraseña</h2>

		<div>
                    Para recuperar su contraseña, vaya a la siguiente dirección: <a href="{{ URL::to('resetpassword', array($type, $token)) }}">Recuperar password</a><br/>
		    Este link expirará en {{ Config::get('auth.reminder.expire', 60) }} minutos.
		</div>
	</body>
</html>
