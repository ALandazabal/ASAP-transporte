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
					<h3 class="panel-title">Editar Transfer</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('transfer.update', $transfer->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<h4>Login: <strong>{{ $transfer->user->name }}</strong></h4>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<input type="text" name="name" id="name" class="form-control input-sm" value="{{ $transfer->name }}">
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<input type="email" name="email" id="email" class="form-control input-sm" value="{{ $transfer->email }}">
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<input type="date" name="date" class="form-control input-sm" value="{{ $transfer->date_pick }}">
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<input type="time" name="time" class="form-control input-sm" value="{{ $transfer->time_pick }}">
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<select name="tviaje" class="form-control">
											<option value="{{ $transfer->vehicle->id }}">{{ $transfer->vehicle->description }}</option>
											@foreach($vehicles as $vehicle)
											@if( $vehicle != $transfer->vehicle )
											<option value="{{ $vehicle->id }}">{{ $vehicle->description }}</option>
											@endif
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<select name="vehicle" class="form-control">
										<option value="{{ $transfer->vehicle->id }}">{{ $transfer->vehicle->description }}</option>
										@foreach($vehicles as $vehicle)
										@if( $vehicle != $transfer->vehicle )
										<option value="{{ $vehicle->id }}">{{ $vehicle->description }}</option>
										@endif
										@endforeach
										</select>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<select name="comuna" class="form-control">
										<option value="{{ $transfer->precio->comuna->id }}">{{ $transfer->precio->comuna->name }}</option>
										@foreach($comunas as $comuna)
										@if( $comuna != $transfer->precio->comuna )
										<option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
										@endif
										@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<button class="btn btn-success" type="submit">Guardar</button>
									<a href="{{ route('transfer.index') }}" class="btn btn-info" >Atrás</a>
								</div>	
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
</div>
@endsection