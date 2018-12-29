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
					<h3 class="panel-title">Detalle Transfer</h3>
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
										<label class="col-md-6">Nombre:</label>
										<input type="text" name="name" id="name" class="form-control input-sm" value="{{ $transfer->name }}" disabled>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Email:</label>
										<input type="email" name="email" id="email" class="form-control input-sm" value="{{ $transfer->email }}" disabled>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Fecha:</label>
										<input type="date" name="date" class="form-control input-sm" value="{{ $transfer->date_pick }}" disabled>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Hora:</label>
										<input type="time" name="time" class="form-control input-sm" value="{{ $transfer->time_pick }}" disabled>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Tipo de servicio:</label>
										<input type="text" name="tviaje" class="form-control input-sm" value="{{ $transfer->precio->tviaje->descripcion }}" disabled>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Vehículo:</label>
										<input type="text" name="vehicle" class="form-control input-sm" value="{{ $transfer->vehicle->description }}" disabled>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Comuna:</label>
										<input type="text" name="vehicle" class="form-control input-sm" value="{{ $transfer->precio->comuna->name }}" disabled>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Precio:</label>
										<input type="text" name="vehicle" class="form-control input-sm" value="{{ $transfer->precio->precio }}" disabled>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Cantidad de pasajeros:</label>
										<input type="text" name="passenger" class="form-control input-sm" value="{{ $transfer->passengers }}" disabled>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-md-6">Cantidad de maletas:</label>
										<input type="text" name="suitcase" class="form-control input-sm" value="{{ $transfer->suitcase }}" disabled>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<!-- <button class="btn btn-success" type="submit">Guardar</button> -->
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