@extends('layouts.default')
@section('pageTitle', 'Galería - ')
@section('content')
<div class="container-fluid cont cont-dark-grey cont-2 ext banner-gale ">
	<h1>Galería</h1>
</div>
<div class="container-fluid cont-1 text-center ext">
    <div class="col-md-6">
    	<h3>La mejor flota del país</h3>
    </div>
    <div class="col-md-6">
    	<span>El servicio unico y especializado para tus servicios de Transfer y Tours desde o hacia el aereopuerto.</span> 
    </div>
</div>
<div class="container-fluid cont-1 text-center ext">
	<div class="col-md-4">
		<img src="{{{ asset('img/carimages/1.jpg') }}}">
    </div>

    <div class="col-md-4">
        <img src="{{{ asset('img/carimages/2.jpg') }}}">
    </div>

    <div class="col-md-4">
        <img src="{{{ asset('img/carimages/3.jpg') }}}">
    </div>

    <div class="col-md-4">
        <img src="{{{ asset('img/carimages/4.jpg') }}}">
    </div>

    <div class="col-md-4">
        <img src="{{{ asset('img/carimages/5.jpg') }}}">
    </div>
</div>
@endsection