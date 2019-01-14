@extends('layouts.default')

@section('content')
<div class="container">
	<div class="col-md-8 col-md-offset-2" id="formContact">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		@if(Session::has('success'))
		<div class="alert alert-info">
			{{Session::get('success')}}
		</div>
		@endif

		<!-- Inicialización de variables de precios -->
		<?php
			$totalpax = 0;
			$totalg = 0;
		?>

		<div class="panel panel-default">
			<div class="panel-heading" id="formContactTitle">
				<h3 class="panel-title">Información de solicitud</h3>
			</div>
			<div class="panel-body">					
				<div class="table-container">
					<form method="post" action="{{ route('transfer.store') }}"  role="form">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label for="name">Nombre: </label><label class="dataTransfer">{{ Auth::user()->name }}</label>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label for="email">Correo Electrónico: </label><label class="dataTransfer">{{ Auth::user()->email }}</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label for="name">Tipo de viaje: </label><label class="dataTransfer">{{ $tviaj->descripcion }}</label>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label for="email">Fecha y hora: </label><label class="dataTransfer"><?php echo date("d/m/Y", strtotime($form_data['date']))?>  {{ $form_data['time'] }}</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label for="name">Desde: </label><label class="dataTransfer">{{ $origen->name }}</label>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label for="email">Hasta: </label><label class="dataTransfer">{{ $destino->name }}</label>
								</div>
							</div>
						</div>
						<div class="row">
							{{-- <div class="col-xs-6">
								<div class="form-group">
									<label for="name">Vehiculo: </label><label class="dataTransfer">{{ $veh->description}}</label>
								</div>
							</div> --}}
							<div class="col-xs-6">
								<div class="form-group">
									<label for="name">Descripción: </label><label class="dataTransfer">{{ $preciod->descripcion }}</label>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label for="suitcase">Cantidad de maletas: </label><label class="dataTransfer">{{ $form_data['suitcase'] }}</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-xs-push-6">
								<div class="form-group">
									<label for="email">Precio: </label><label class="dataTransfer">{{ $preciod->precio }}</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label for="passenger">Cantidad de pasajeros: </label><label class="dataTransfer">{{ $form_data['passenger'] }}</label>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label for="email">Precio: </label><label class="dataTransfer">{{ $cuotaPax }}</label>
									<?php $totalpass = $cuotaPax; ?>
								</div>
							</div>
						</div>
				
				@if(isset($form_data['sguia']))
					@foreach( $servs as $serv)
						@if($serv->id == 2)
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label for="name">Servicio: </label><label class="dataTransfer">{{ $serv->descripcion }}</label>
										
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label for="email">Precio: </label><label class="dataTransfer">{{ $serv->price }}</label>
									<?php $totalg = $serv->price; ?>
								</div>
							</div>
						</div>
						@endif
					@endforeach
				@endif
						<div class="row">
							<div class="col-xs-6 col-xs-offset-6">
								<div class="form-group">
									<label for="email">Total: </label><label class="dataTransfer">
										<?php 
											$total = $preciod->precio + $totalg + $totalpass;
											echo $total;
										?>											
									</label>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<div class="col-md-12">
										<label for="pago">Método de Pago</label>
									</div>
									<div class="col-md-6">
										<input type="radio" class="" name="pago" value="webpay"> WebPay+
									</div>						
									{{-- <div class="col-md-6">
										<input type="radio" class="" name="pago" value="paypal"> PayPal
									</div>	 --}}					
								</div>
							</div>
						</div>

						{{-- Valores traidos del otro fomulario--}}
						<input type="hidden" name="name" value="{{ $form_data['name'] }}">
						<input type="hidden" name="email" value="{{ $form_data['email'] }}">
						<input type="hidden" name="origin" value="{{ $form_data['origin2'] }}">
						<input type="hidden" name="comuna" value="{{ $form_data['comunat'] }}">
						<input type="hidden" name="tviaje" value="{{ $form_data['tviajet'] }}">
						<input type="hidden" name="date" value="{{ $form_data['date'] }}">
						<input type="hidden" name="time" value="{{ $form_data['time'] }}">
						<input type="hidden" name="vehicle" value="{{ $form_data['vehicle'] }}">
						<input type="hidden" name="passenger" value="{{ $form_data['passenger'] }}">
						<input type="hidden" name="suitcase" value="{{ $form_data['suitcase'] }}">
						<?php 
							if(isset($form_data['sguia'])){
						?>
								<input type="hidden" name="sguia" value="1">
						<?php
							}else{
						?>
								<input type="hidden" name="sguia" value="0">
						<?php
							}
						?>
						

						<div class="row buttonSend">
							<div class="col-xs-12">
								<a href="{{ route('transfer.create') }}" class="btn btn-info" >Atrás</a>
								<button class="btn btn-success" type="submit">Solicitar</button>
							</div>	
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection