@extends('layouts.default')
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
					<h3 class="panel-title">Editar Slide</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('sliderconfig.update', $slider->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<input type="text" name="title" id="title" class="form-control input-sm" value="{{ $slider->title }}">
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<input type="text" name="description" id="description" class="form-control input-sm" value="{{ $slider->description }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<input type="file" name="photo" id="photo" class="form-control input-sm" value="{{ $slider->photo }}">
										<input type="hidden" title="Fallback when no photo provided." name="photo-name" value="{{ $slider->photo }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<button class="btn btn-success" type="submit">Guardar</button>
									<a href="{{ route('sliderconfig.index') }}" class="btn btn-info" >Atrás</a>
								</div>	
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection