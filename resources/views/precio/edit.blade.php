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
				<h3 class="panel-title">Edita Transfer/Tour</h3>
			</div>
			<div class="panel-body">
				<div class="table-container">
					<form method="post" action="{{ route('precios.update', $precios->id) }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input name="_method" type="hidden" value="PATCH">
						<label for="tposviajei">Tipo de viaje</label>
						<select class="form-control" name="tposviajei">
							{{-- <option>Seleccione una opción</option> --}}
							@foreach( $tviajes as $tviaje)
								@if( $tviaje->id == $precios->tviaje->id )
									<option value="{{ $tviaje->id }}" selected="selected">{{ $tviaje->descripcion }}</option>
								@else
									<option value="{{ $tviaje->id }}">{{ $tviaje->descripcion }}</option>
								@endif
							@endforeach
						</select>
						<label for="Comuna">Comuna</label>
						<select class="form-control" name="comuna">
							{{-- <option>Seleccione una opción</option> --}}
							@foreach( $comunas as $comuna)
								@if( $comuna == $precios->comuna )
									<option value="{{ $comuna->id }}" selected="selected">{{ $comuna->name }}</option>
								@else
									<option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
								@endif
							@endforeach
						</select>
						<label for="Description">Descripción</label>
						<input type="text" class="form-control" name="description" value="{{ $precios->descripcion }}">					
						<label for="Price">Precio</label>
						<input type="text" class="form-control" name="precio" value="{{ $precios->precio }}">
						<button type="submit" class="btn btn-success">Guardar</button>
						<a href="{{ route('precios.index') }}" class="btn btn-info" >Atrás</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection