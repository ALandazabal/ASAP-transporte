@extends('layouts.default')
@section('content')
<div class="container">
	<div class="col-md-5 col-md-offset-4" id="formEnvio">
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

		<div class="panel panel-default">
			<div class="panel-heading" id="formTitle">
				<h3 class="panel-title">Solicitud</h3>
			</div>
			<div class="panel-body">					
				<div class="table-container">
					<form method="post" action="{{ route('transfer.contact') }}"  role="form">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="name">Nombre</label>
									<input type="text" class="form-control input-sm" name="name2" value="{{ Auth::user()->name }}" required disabled>
									<input type="hidden" class="form-control input-sm" name="name" value="{{ Auth::user()->name }}" required >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="email">Correo Electrónico</label>
									<input type="email" class="form-control input-sm" name="email2" value="{{ Auth::user()->email }}" required disabled>
									<input type="hidden" class="form-control input-sm" name="email" value="{{ Auth::user()->email }}" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="Tviajet">Tipo de servicio:</label>
									<select class="form-control" name="tviajet" id="tviajet">
										@foreach( $tposviaje as $tviaje)
										<option value="{{ $tviaje->id }}">{{ $tviaje->descripcion }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="Origin2t">Transfer desde:</label>
									<select class="form-control" name="origin2t" id="origin2t">
									<option value="0">Aeropuerto Internacional Comodoro Arturo Medino Benítez</option>
									@foreach( $comunas as $comuna)
										<option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
										@endforeach
									</select>
									<input type="hidden" class="form-control input-sm" name="origin" value="Aeropuerto Internacional Comodoro Arturo Medino Benítez" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="Comunat">Transfer hasta:</label>
									<select class="form-control" name="comunat" id="comunat">
										{{-- @foreach( $comunas as $comuna)
										<option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
										@endforeach --}}
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="Date">Fecha de Búsqueda</label>
									<input type="date" class="form-control" name="date" required min="<?php $hoy=date('Y-m-d'); echo $hoy; ?>">
									<label for="Time">Hora de Búsqueda</label>
									<input type="time" class="form-control" name="time" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="Vehicle">Vehículo:</label>
									<select class="form-control" name="vehicle">
										@foreach( $vehicles as $vehicle)
										<option value="{{ $vehicle->id }}">{{ $vehicle->description }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<div class="form-group">
									<label for="passenger">Número de pasajeros:</label>
									<input type="number" name="passenger" id="passenger" min="1" max="8" value="1">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<div class="form-group">
									<label for="suitcase">Número de maletas:</label>
									<input type="number" name="suitcase" id="suitcase" min="0" max="99" value="0">
								</div>
							</div>
						</div>
						<!-- <div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label><input type="checkbox" id="travelType" value="Tipo de viaje"> Ida y vuelta</label><br>
								</div>
							</div>
						</div> -->
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<input type="checkbox" name="sguia" id="sguia" value="2"> <label>Servicio guía de idioma</label><br>
								</div>
							</div>
						</div>
						<div class="row text-center">
							<div class="col-xs-12">							
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