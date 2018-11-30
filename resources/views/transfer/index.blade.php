@extends('layouts.default')
@section('content')
<div class="row">
	<section class="filters">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3>Busqueda por:</h3>
			</div>
		</div>
		<div class="col-md-8 col-md-offset-2">
			<form method="GET" action="{{ route('transfer.index') }}"  role="form">
				{{ csrf_field() }}
				<div class="col-xs-4">
					<div class="form-group">
						<input type="text" name="emailb" id="emailb" class="form-control input-sm"  placeholder="Email">
					</div>
				</div>
				<div class="col-xs-4">
					<div class="form-group">
						<input type="text" name="destinob" id="destinob" class="form-control input-sm" placeholder="Destino">
					</div>
				</div>
				<div class="col-xs-4">
					<div class="form-group">
						<input type="date" name="finicial" id="finicial" class="form-control input-sm" max="<?php $hoy=date('Y-m-d'); echo $hoy; ?>">
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-right">
						<button class="btn btn-success" type="submit">Buscar</button>
					</div>	
				</div>
			</form>
		</div>
	</section>
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="pull-left"><h3>Lista Transfers</h3></div>
					<div class="table-container">
						<table id="mytable" class="table table-bordred table-striped">
							<thead>
								<th>#</th>
								<th>Login</th>
								<th>Email</th>
								<th>Vehículo</th>
								<th>Destino</th>
								<th>Ver</th>
								<th>Modificar</th>
							</thead>
							<tbody>
								@if($transfers->isNotEmpty())
									@foreach($transfers as $transfer)  
										<tr>
											<th>{{ $transfer->id }}</th>
											<td>{{ $transfer->user->name }}</td>
											<td>{{ $transfer->email }}</td>
											<td>{{ $transfer->vehicle->description }}</td>
											@if($precios->isNotEmpty())
												@foreach($precios as $precio)
													@if($precio->id == $transfer->precio_id)
														@if($comunas->isNotEmpty())
															@foreach($comunas as $comuna)
																@if($comuna->id == $precio->comuna_id)
																	<td>{{ $comuna->name }}</td>
																@endif
															@endforeach 
														@else
															<tr>
																<td colspan="8">No hay registros !!</td>
															</tr>
														@endif
													@endif
												@endforeach 
											@else
												<tr>
													<td colspan="8">No hay registros !!</td>
												</tr>
											@endif
											<td><a class="btn btn-primary btn-xs" href="{{action('TransferController@show', $transfer->id)}}" ><span class="glyphicon glyphicon-eye-open"></span></a>
											</td>
											<td><a class="btn btn-primary btn-xs" href="{{action('TransferController@edit', $transfer->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a>
											</td>
										</tr>
									@endforeach 
								@else
								<tr>
									<td colspan="8">No hay registros !!</td>
								</tr>
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection