@extends('layouts.default')

@section('styles')
@section('scripts')
<link rel="stylesheet" href="{{asset('owlcarousel/assets/owl.carousel.min.css')}}">
<script type="text/javascript" src="{{asset('owlcarousel/owl.carousel.min.js')}}"></script>
@endsection
@endsection
@section('content')

<div class="container-fluid cont-1 text-center ext cont-light-grey">
	<h2>Bienvenido a transportes ASAP</h2>
	{{-- <div class="col-md-6">
		<h2><i class="fas fa-map-marked-alt"></i></h2>
		<h3>Turismo</h3>
		<span>Ofrecemos servicios de transporte turistico a cualquier lugar de Chile, para que usted pueda obtener un viaje placentero hacia su empresa o lugar de destino..</span>
	</div>
	<div class="col-md-6">
		<h2><i class="fas fa-shuttle-van"></i></h2>
		<h3>Servicio de Transfer</h3>
		<span>Ofrecemos servicios de transporte para su empresa, organización o institución, con la seguridad de una empresa de trayectoria, compuesta por profesionales expertos en transporte.</span>
	</div> --}}


	{{-- Este es para calculo de los pasajeros en contact --}}
	{{-- @if($form_data['passenger'] > 4 && $form_data['tviajet'] == 2)
					@foreach( $servs as $serv)
						@if($serv->id == 3)
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label for="name">Cargo por servicio: </label><label class="dataTransfer">{{ $serv->descripcion }}</label>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label for="email">Precio: </label><label class="dataTransfer">
										<?php 
											$pax = $form_data['passenger'] - 4;
											$totalpax = $serv->price * $pax; 
											echo $totalpax;
										?>											
									</label>
								</div>
							</div>
						</div>
						@endif
					@endforeach
				@endif --}}


</div>
<div class="container-fluid  text-center cont-2 ext">
	{{-- <h2>Vehículos Disponibles</h2> --}}
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
					<div class="etiquetaImg">
						<h3>{{ $slide->title }}</h3>
						<span class="quote">{{ $slide->description }}</span>
					</div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
	</div>
</div>
{{-- <div class="container-fluid  text-center cont-2 ext  cont-light-grey">
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
					<h3><i class="fas fa-futbol"></i>Football Club</h3>
				</div>
			</div>
			<div class="item">
				<div class="jumbotron cont-dark-grey">
					<h3><i class="fas fa-tree"></i> Natural Fargo</h3>
				</div>
			</div>
		</div>
	</div>
</div> --}}
<div class="container-fluid text-center cont-3 ext">
	<div class="col-md-6 text-center cont-box3">
		<div class="row iconValores cont-dark-grey icons">
			<h3 id="iconValores">Nuestros valores</h3>
			<div class="col-md-3">
				<i class="fas fa-car-side"></i>
				<h4>Discresion</h4>
			</div>
			<div class="col-md-3">
				<i class="fas fa-truck-pickup"></i>
				<h4>Comodidad</h4>
			</div>
		{{-- </div>
		<div class="row iconValores"> --}}
			<div class="col-md-3">
				<i class="fas fa-helicopter"></i>
				<h4>Puntualidad</h4>
			</div>
			<div class="col-md-3">
				<i class="fas fa-shuttle-van"></i>
				<h4>Atencion 24/7</h4>
			</div>
		</div>

		<div class="container-fluid ext register">
			<div class="col-md-6">
				<h3 class=" margin-register">Registrate</h3>
				<span class="text-light">Para recibir atencion personalizada, noticias y promociones de nuestros servicios.</span>
			</div>
			<div class="col-md-6" id="contactForm">
				<form>
					<div class="col-md-12 margin-register">
						<input type="text" class="form-control" placeholder="Ingrese su E-mail" name="">
					</div>
					<div class="col-md-6 col-md-push-6">
						<a href="{{ route('register') }}" class="btn btn-default btn-registro">Registrate!</a>
					</div>
				</form>
			</div>
		</div>
		
	</div>
	<div id="prueba" class="col-md-6 container-fluid text-center cont-light-blue cont-box3">
		<div class="jumbotron">
			<h2>Cotización</h2>
			<form method="post" action="{{ route('contizacionForm') }}"  role="form">
				{{ csrf_field() }}
				<!-- @if(Session::has('success'))
				<div class="alert alert-info">
					{{Session::get('success')}}
				</div>
				@endif -->
				<?php
					if(isset($success)){ ?>
						{{-- echo '<label>'.$success.'</label>'; --}}
						<div class="modal" tabindex="-1" role="dialog" id="myModal" style="display: block;">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}
						        <h3 class="modal-title">Cotización realizada</h3>
						      </div>
						      <div class="modal-body">
						      	<p>La cotización para el tipo de viaje: <?php echo '<label>'.$sviaje.'</label>'; ?> y hacia/desde la comuna: <?php echo '<label>'.$scomu.'</label>'; ?>, tiene un valor de <?php echo '<label>'.$success.'</label>'; ?>
						      	</p>
						      	</br>
						      	<p>Le recordamos que por cada pasajero extra (superior a 4), se le realizará una recarga de <?php echo '<label>'.$paxtra.'</label>'; ?></p>
						      </div>
						      <div class="modal-footer">
						        <button id="closeButtonModal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
						      </div>
						    </div>
						  </div>
						</div>
				<?php	}
				?>
				<div class="form-group">
					<select class="form-control" name="origin2" disabled>
						<option>Aeropuerto Internacional Comodoro Arturo Medino Benítez</option>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="tviaje">
						<option value="null">Tipo de servicio</option>
						@foreach( $tposviaje as $tviaje)
						<option value="{{ $tviaje->id }}">{{ $tviaje->descripcion }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="comuna">
						<option value="null">Punto de Origen/Destino</option>
						@foreach( $comunas as $comuna)
						<option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="passenger">
						<option value="null">Cantidad de pasajeros</option>
						@for($i = 1; $i < 9; $i++)
							<option value="{{ $i }}">{{ $i }}</option>
						@endfor
					</select>
				</div>
				<div class="form-group">
					 <button type="submit" class="btn btn-primary">Enviar</button> 
					<!--<button type="button" data-toggle="modal" data-target="#create" class="btn btn-primary">Enviar</button>-->
				</div>
			</form>
		</div>
	</div>
</div>
{{-- <div class="container-fluid ext register">
	<div class="col-md-6">
		<h3>Registrate</h3>
		<span class="text-light">Para recibir atencion personalizada, noticias y promociones de nuestros servicios.</span>
	</div>
	<div class="col-md-6" id="contactForm">
		<form>
			<div class="col-md-9">
				<input type="text" class="form-control" placeholder="Ingrese su E-mail" name="">
			</div>
			<div class="col-md-3">
				<a href="{{ route('register') }}" class="btn btn-default">Registrate!</a>
			</div>
		</form>
	</div>
</div> --}}


<script type="text/javascript">
	$('#closeButtonModal').click(function () {
	  $('#myModal').toggle();
	})
</script>
@endsection
<!-- @include('transfer.cotizacion') -->