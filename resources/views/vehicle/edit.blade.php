@extends('layouts.users')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
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
					<h3 class="panel-title">Editar Vehículo</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('vehicle.update', $car->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Descripcion:</label>
										<input type="text" name="description" id="description" class="form-control input-sm" value="{{ $car->description }}" required>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Cantidad de pasajeros:</label>
										<input type="number" max="100" min="0" name="passengers" id="passengers" class="form-control input-sm" value="{{ $car->passengers }}" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Foto del vehículo:</label>
										<input type="file" name="photo" id="photo" class="form-control input-sm" value="{{ $car->photo }}">
										<input type="hidden" title="Fallback when no photo provided." name="photo-name" value="{{ $car->photo }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<button class="btn btn-success" type="submit">Guardar</button>
									<a href="{{ route('vehicle.index') }}" class="btn btn-info" >Atrás</a>
								</div>	
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection