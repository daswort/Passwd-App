<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{ Lang::get('misc.reset_email_subject') }}</h2>

		<div>
			{{ Lang::get('misc.reset_email_text') }}: {{ URL::to('/user/password-reset', array($token)) }}.
		</div>
	</body>
</html>