@extends('layouts.default')
@section('pageTitle', 'Contacto - ')
@section('content')
<div class="container-fluid cont cont-dark-grey cont-2 ext banner-cont ">
	<h1>Contacto</h1>
</div>
<div class="container-fluid cont-1 ext">
	<div class="row cont-1 text-center">
		<h3>Atendemos sus solicitudes y dudas sobre nuestros servicios</h3>
		<h4>Complete el formulario y nos comunicaremos con usted lo mas pronto posible.</h4>
	</div>
	<div class="car-box col-md-6">
	</div>
	<div class="jumbotron col-md-6">
		<form>
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Nombre" name="">
				</div>
				<div class="form-group">
					<input type="email" class="form-control" placeholder="Email" name="">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Asunto" name="">
				</div>
			</div>
			<div class="col-md-6">
				<textarea  class="form-control" placeholder="Mensaje" style="height: 132px; resize: none;"></textarea>
			</div>
			<div class="col-md-12">
				<button type="submit" class="btn btn-default">Enviar</button>
			</div>
		</form>
	</div>
	<div class="col-md-12 cont-1 text-center">
		<h3>Si no desea escribir ¡Llamenos!</h3>
		<h2>+56 2 2866 8950</h2>
	</div>
</div>
<div class="container-fluid cont-2 ext">
	<iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3329.8291296300977!2d-70.59552698480134!3d-33.427698880780454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662cf0dc79f179f%3A0x7fc13f48ca59145!2sEliodoro+Ya%C3%B1ez+2876%2C+Oficina+401%2C+Providencia%2C+Regi%C3%B3n+Metropolitana%2C+Chile!5e0!3m2!1ses!2sve!4v1547474136528"frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
@endsection