@extends('layouts.default')
@section('content')
<div class="container">
	<div class="col-md-4 col-md-offset-4 text-center">
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
			<div class="panel-heading">
				<h3 class="panel-title">Solicitud</h3>
			</div>
			<div class="panel-body">					
				<div class="table-container">
					<form method="post" action="{{ route('transfer.contact') }}"  role="form">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="Origin">Origen:</label>
									<select class="form-control" name="origin" disabled>
									<option>Aeropuerto Internacional Comodoro Arturo Medino Benítez</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="Comuna">Destino:</label>
									<select class="form-control" name="comuna">
										@foreach( $comunas as $comuna)
										<option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
										@endforeach
									</select>
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