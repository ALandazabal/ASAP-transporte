<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('pageTitle')ASAP Servicio de Transporte</title>
	<link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	@yield('styles')
</head>
<body>
	<header>
		@include('includes.header')
	</header>
	<section>
		@yield('content')
	</section>
	@include('includes.footer')
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	@yield('scripts')
</body>
</html>