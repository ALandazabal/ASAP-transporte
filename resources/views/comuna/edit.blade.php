@extends('layouts.users')
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
				<h3 class="panel-title">Editar Comuna</h3>
			</div>
			<div class="panel-body">
				<div class="table-container">
					<form method="post" action="{{ route('comuna.update', $comuna->id) }}" role="form">
						{{ csrf_field() }}
						<input name="_method" type="hidden" value="PATCH">
						<label for="Name">Nombre</label>
						<input type="text" class="form-control" name="name" value="{{ $comuna->name }}">
						<label for="Distance">Distancia</label>
						<input type="number" step=0.01 class="form-control" name="distance" value="{{ $comuna->distance }}">
						<label for="Coords">Coordenadas</label>
						<input type="text" class="form-control" name="coords" value="{{ $comuna->coords }}">
						<button type="submit" class="btn btn-success">Agregar</button>
						<a href="{{ route('comuna.index') }}" class="btn btn-info" >Atrás</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection