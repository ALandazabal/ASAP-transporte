<!DOCTYPE html>
<html>
<head>
	<title>Redireccionando a Webpay...</title>
</head>
<body>
	<form action="{{ $formAction }}" id="webpay-form" method="POST">
		<input type="hidden" name="token_ws" value="{{ $tokenWs }}">
	</form>

	<script>document.getElementById("webpay-form").submit();</script>
</body>
</html>