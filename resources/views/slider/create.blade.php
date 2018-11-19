@extends('layouts.default')
@section('content')

<div class="container">
	<div class="col-md-4 text-center">
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
				<h3 class="panel-title">Nuevo Slide</h3>
			</div>
			<div class="panel-body">
				<div class="table-container">
					<form method="post" action="{{ route('sliderconfig.store') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<label for="Title">Título</label>
						<input type="text" class="form-control" name="title">
						<label for="Description">Descripción</label>
						<input type="text" class="form-control" name="description">
						<label for="Photo">Imagen</label>
						<input type="file" class="form-control" name="photo">
						<button type="submit" class="btn btn-success">Agregar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection