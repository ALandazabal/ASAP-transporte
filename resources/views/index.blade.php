@extends('layouts.default')
@section('content')
<div class="container-fluid cont-1 text-center ext cont-light-grey">
	<h2>Bienvenido a ASAP</h2>
	<div class="col-md-6">
		<h2><i class="fas fa-map-marked-alt"></i></h2>
		<h3>Turismo</h3>
		<span>Ofrecemos servicios de transporte turistico a cualquier lugar de Chile, para que usted pueda obtener un viaje placentero hacia su empresa o lugar de destino..</span>
	</div>
	<div class="col-md-6">
		<h2><i class="fas fa-user-tie"></i></h2>
		<h3>Empresas</h3>
		<span>Ofrecemos servicios de transporte para su empresa, organización o institución, con la seguridad de una empresa de trayectoria, compuesta por profesionales expertos en transporte.</span>
	</div>
</div>
<div class="container-fluid  text-center cont-2 ext">
	<h2>Vehiculos Disponibles</h2>
	<div class="">
		<script type="text/javascript">
			$(document).ready(function() {
				$('.owl-cars').owlCarousel({
					autoplay: true,
				    autoplayHoverPause: true,
				    margin:10,
					loop: true,
				    responsiveClass:true,
					items:1
				});
			});
		</script>
		<div class="owl-cars owl-carousel owl-theme">
			@if ($slider->isNotEmpty())
			@foreach($slider as $slide)
			<div class="item">
				<div class="test">
					<img src="../img/carimages/{{ $slide->photo }}">
					<h3>{{ $slide->title }}</h3>
					<span class="quote">Pasajeros: {{ $slide->description }}</span>
				</div>
			</div>
			@endforeach
			@endif
		</div>
	</div>
</div>
<div class="container-fluid  text-center cont-2 ext  cont-light-grey">
	<h2>Nuestra Clientela</h2>
	<div class="container-fluid ext">
		<script type="text/javascript">
			$(document).ready(function() {
				$('.owl-client').owlCarousel({
					autoplay: true,
					loop: true,
				    responsiveClass:true,
				    margin: 10,
				    autoHeight:true,
				    responsive:{
						0:{
							items:1
						},
						480:{
							items:2
						},
						768:{
							items:4
						}
					}
				});
			});
		</script>
		<div class="owl-client owl-carousel owl-theme">
			<div class="item">
				<div class="jumbotron cont-dark-grey">
					<h3><i class="fas fa-plane"></i> Cloud Postale</h3>
				</div>
			</div>

			<div class="item">
				<div class="jumbotron cont-dark-grey">
					<h3><i class="fas fa-hospital"></i> Medical Lungs</h3>
				</div>
			</div>

			<div class="item">
				<div class="jumbotron cont-dark-grey">
					<h3><i class="fas fa-motorcycle"></i> Itachi Motors</h3>
				</div>
			</div>

			<div class="item">
				<div class="jumbotron cont-dark-grey">
					<h3><i class="fas fa-american-sign-language-interpreting"></i> Logistic Things</h3>
				</div>
			</div>

			<div class="item">
				<div class="jumbotron cont-dark-grey">
					<h3><i class="fas fa-futbol"></i> Lorem Football Club</h3>
				</div>
			</div>
			<div class="item">
				<div class="jumbotron cont-dark-grey">
					<h3><i class="fas fa-tree"></i> Natural Fargo</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid text-center cont-3 ext">
	<div class="col-md-6 container-fluid text-center cont-dark-grey icons">
		<h3>Nuestros valores</h3>
		<div class="col-md-6">
			<i class="fas fa-car-side"></i>
			<h4>Discresion</h4>
		</div>
		<div class="col-md-6">
			<i class="fas fa-truck-pickup"></i>
			<h4>Comodidad</h4>
		</div>
		<div class="col-md-6">
			<i class="fas fa-helicopter"></i>
			<h4>Puntualidad</h4>
		</div>
		<div class="col-md-6">
			<i class="fas fa-shuttle-van"></i>
			<h4>Atencion 24/7</h4>
		</div>
	</div>
	<div class="col-md-6 container-fluid text-center cont-light-blue">
		<div class="jumbotron">
			<h2>Cotizacion</h2>
			<form>
				<div class="form-group">
					<select class="form-control" name="service-value">
						<option>Seleccione una opcion</option>
						<option>Santiago</option>
						<option>Peninsula</option>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="service-value">
						<option>Seleccione una opcion</option>
						<option>Carro 1</option>
						<option>Van 1</option>
					</select>
				</div>
				<div class="form-group">
					<button type="button" class="btn  btn-primary">Enviar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="container-fluid ext register">
	<div class="col-md-6">
		<h3>Registrate</h3>
		<span class="text-light">Para recibir atencion personalizada, noticias y promociones de nuestros servicios.</span>
	</div>
	<div class="col-md-6">
		<form>
			<div class="col-md-9">
				<input type="text" class="form-control" placeholder="Ingrese su E-mail" name="">
			</div>
			<div class="col-md-3">
				<a href="{{ route('register') }}" class="btn btn-default">Registrate!</a>
			</div>
		</form>
	</div>
</div>
@endsection