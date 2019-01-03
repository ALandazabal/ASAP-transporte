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
										<label class="col-md-6">Estado de servicio:</label>
										<select name="status" class="form-control">
											<option value="{{ $status->statetf->id }}">{{ $status->statetf->valor }}</option>
											@foreach($estados as $estado)
												@if( $estado->id != $status->statetf->id )
													<option value="{{ $estado->id }}">{{ $estado->valor }}</option>
												@endif
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Nombre:</label>
										<input type="text" name="name" id="name" class="form-control input-sm" value="{{ $transfer->name }}">
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Email:</label>
										<input type="email" name="email" id="email" class="form-control input-sm" value="{{ $transfer->email }}">
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Fecha:</label>
										<input type="date" name="date" class="form-control input-sm" value="{{ $transfer->date_pick }}" min="{{ $transfer->date_pick }}">
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Hora:</label>
										<input type="time" name="time" class="form-control input-sm" value="{{ $transfer->time_pick }}">
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Tipo de servicio:</label>
										<select name="tviaje" class="form-control">
											<option value="{{ $transfer->precio->tviaje->id }}">{{ $transfer->precio->tviaje->descripcion }}</option>
											@foreach($tviajes as $tviaje)
												@if( $tviaje->id != $transfer->precio->tviaje->id )
													<option value="{{ $tviaje->id }}">{{ $tviaje->descripcion }}</option>
												@endif
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Vehículo:</label>
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
										<label class="col-md-6">Comuna:</label>
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
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Precio:</label>
										<input type="text" name="price" class="form-control input-sm" value="{{ $transfer->precio->precio }}">
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Cantidad de pasajeros:</label>
										<input type="text" name="passenger" class="form-control input-sm" value="{{ $transfer->passengers }}" >
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Cantidad de maletas:</label>
										<input type="text" name="suitcase" class="form-control input-sm" value="{{ $transfer->suitcase }}">
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