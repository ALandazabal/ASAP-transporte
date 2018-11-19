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
		<h4>+56 2 2866 8950</h4>
	</div>
</div>
<div class="container-fluid cont-2 ext">
	<iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3330.800889121809!2d-70.55652398483318!3d-33.402358480787804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662cec6c6a5d4e7%3A0x7b4cc5b95b23ace5!2sLeonardo+Da+Vinci+7500%2C+Las+Condes%2C+Regi%C3%B3n+Metropolitana%2C+Chile!5e0!3m2!1ses-419!2sco!4v1538488983012" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
@endsection