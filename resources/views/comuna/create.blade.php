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
				<h3 class="panel-title">Nueva Comuna</h3>
			</div>
			<div class="panel-body">
				<div class="table-container">
					<form method="post" action="{{ route('comuna.store') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<label for="Name">Nombre</label>
						<input type="text" class="form-control" name="name">
						<label for="Description">Descripción</label>
						<input type="text" class="form-control" name="description">
						<label for="tposviajei">Tipo de viaje</label>
						<select class="form-control" name="tposviajei">
							<option>Seleccione una opción</option>
							@foreach( $tposviajes as $tposviaje)
							<option value="{{ $tposviaje->id }}">{{ $tposviaje->descripcion }}</option>
							@endforeach
						</select>
						<label for="Price">Precio</label>
						<input type="text" class="form-control" name="precio">
						<label for="Distance">Distancia</label>
						<input type="number" step=0.01 class="form-control" name="distance">
						<label for="Coords">Coordenadas</label>
						<input type="text" class="form-control" name="coords">
						<button type="submit" class="btn btn-success">Agregar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection