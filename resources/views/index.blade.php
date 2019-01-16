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
</div>
<div class="container-fluid  text-center cont-2 ext">
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
<div class="container-fluid text-center cont-3 ext">
	<div class="col-md-6 text-center cont-box3">
		{{--<div class="container-fluid cont-1 text-center ext">--}}
		<div class="row iconValores cont-dark-grey icons"> 
			<h3 id="iconValores">Nuestros valores</h3>
			<div class="col-md-3 ">
		        <div class="col-md-12 conico">
		    		<div class="cont-ico">
		    			<i class="fas fa-car-side"></i>
						<h4>Discresion</h4>
		        	</div>
		        </div>
		    </div>

		    <div class="col-md-3 ">
		        <div class="col-md-12 conico">
		    		<div class="cont-ico">
		    			<i class="fas fa-truck-pickup"></i>
						<h4>Comodidad</h4>
		        	</div>
		        </div>
		    </div>

		    <div class="col-md-3 ">
		        <div class="col-md-12 conico">            
		            <div class="cont-ico">
		                <i class="fas fa-helicopter"></i>
						<h4>Puntualidad</h4>
		            </div>
		        </div>
		    </div>

		    <div class="col-md-3 ">
		        <div class="col-md-12 conico">
		    		<div class="cont-ico">
		    			<i class="fas fa-shuttle-van"></i>
						<h4>Atencion 24/7</h4>
		        	</div>
		        </div>
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
				<?php
					if(isset($success)){ ?>
						<div class="modal" tabindex="-1" role="dialog" id="myModal" style="display: block;">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h3 class="modal-title">Cotización realizada</h3>
						      </div>
						      <div class="modal-body">
						      	<p>La cotización para el tipo de viaje: <?php echo '<label>'.$sviaje.'</label>'; ?> desde: <?php echo '<label>'.$desde.'</label>'; ?> hasta: <?php echo '<label>'.$hasta.'</label>'; ?>, tiene un valor de <?php echo '<label>'.$success.'</label>'; ?>
						      	</p>
						      	</br>
						      	<p>Le recordamos que en los Tours, por cada pasajero extra (superior a 4), se le realizará una recarga de <?php echo '<label>'.$paxtra.'</label>'; ?></p>

						      	<p>Le recordamos que en los Transfers, tendra una recarga por espera en el aeropuerto de <?php echo '<label>'.$waitser.'</label>'; ?></p>
						      </div>
						      <div class="modal-footer">
						        <button id="closeButtonModal" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						      </div>
						    </div>
						  </div>
						</div>
				<?php	}
				?>
				<div class="form-group">
					<select class="form-control" name="tviaje" id="tviaje">
						<option value="null">Tipo de servicio</option>
						@foreach( $tposviaje as $tviaje)
						<option value="{{ $tviaje->id }}">{{ $tviaje->descripcion }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="comuna" id="comuna">
						<option>Punto de Origen</option>
						{{-- <option value="0">Aeropuerto Internacional Comodoro Arturo Medino Benítez</option> 
						@foreach( $comunas as $comuna)
						<option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
						@endforeach--}}
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="origin2" id="origin2">
						<option value="null">Punto de Destino</option>
						{{-- <option>Aeropuerto Internacional Comodoro Arturo Medino Benítez</option>
						@foreach( $comunas as $comuna)
						<option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
						@endforeach --}}
					</select>
					<label id="aditional-note">Algunas comunas tienen un recargo adicional</label>
				</div>
				<div class="form-group">
					<select class="form-control" name="passenger">
						<option value="null">Cantidad de pasajeros</option>
						@foreach( $passengers as $passenger)
						<option value="{{ $passenger->id }}">{{ $passenger->descripcion }}</option>
						@endforeach
						{{-- @for($i = 1; $i < 9; $i++)
							<option value="{{ $i }}">{{ $i }}</option>
						@endfor --}}
					</select>
				</div>
				<div class="form-group">
					 <button type="submit" class="btn btn-primary">Enviar</button> 
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#closeButtonModal').click(function () {
	  $('#myModal').toggle();
	})
</script>
@endsection