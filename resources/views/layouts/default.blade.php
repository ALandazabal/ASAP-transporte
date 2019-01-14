<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('pageTitle')ASAP Servicio de Transporte</title>
	<link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	@yield('styles')
</head>
<body>
	<?php
		header('Pragma: public');
	    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");        // Date in the past   
	    header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
	    header('Cache-Control: no-store, no-cache, must-revalidate');     // HTTP/1.1
	    header('Cache-Control: pre-check=0, post-check=0, max-age=0', false);    // HTTP/1.1
	    header("Pragma: no-cache");
	    header("Expires: 0", false);
	?>
	<header>
		@include('includes.header')
	</header>
	<section class="container" id="container">
		@yield('content')
	</section>
	@include('includes.footer')
	<!-- <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script> -->
	<script type="text/javascript" src="{{asset('js/events.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	@yield('scripts')
</body>
</html>